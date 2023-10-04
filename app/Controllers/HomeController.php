<?php

namespace App\Controllers;

use App\Model\Authors;
use App\Models\Categories;
use App\Models\LikedPosts;
use App\Models\PageViews;
use App\Models\PodcastComments;
use App\Models\Podcasts;
use App\Models\PostCategories;
use App\Models\PostComments;
use App\Models\Posts;
use App\Models\ReplyPodcastComments;
use App\Models\ReplyPostComments;
use App\Models\Users;
use App\Models\Viewers;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class HomeController extends controller
{
    private object $blade;
    private $posts;
    private $users;
    private $userId;
    private $postsLang;
    private $authorsLang;
    private $authors;
    private $categories;
    private $postCats;
    private $podcasts;
    private $likedPosts;
    private $pageViews;

    public function __construct()
    {
        $this->blade = $this->view()->blade();
        $this->posts = loadModel(Posts::class);
        $this->users = loadModel(Users::class);
        $this->authors = loadModel(Authors::class);
        $this->categories = loadModel(Categories::class);
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['USERID'])) {
            $this->userId = $_SESSION['USERID'];
        }
        $lang = ConfigHelper::getConfig('default-language');
        $this->postsLang = loadLang($lang, 'posts');
        $this->authorsLang = loadLang($lang, 'authors');
        $this->postCats = loadModel(PostCategories::class);
        $this->podcasts = loadModel(Podcasts::class);
        $this->likedPosts = loadModel(LikedPosts::class);
        $this->pageViews = loadModel(PageViews::class);
    }

    public function homePage()
    {
        $ip = getClientIP();
        $viewers = loadModel(Viewers::class);
        if (empty(current($viewers->get(['ip' => $ip])))) {
            $viewers->insert(['ip' => $ip]);
        }

        $main = current($this->pageViews->get(['page_name' => 'main']));
        $this->pageViews->update(['page_name' => 'main'], ['views' => $main->views + 1]);
        echo $this->blade->render('frontend/main/main', [
            'view' => $this->blade,
            'posts' => $this->loadFrontPosts(),
        ]);
    }

    public function showPosts()
    {
        $postsToShow = $this->posts->get();
        $view = $this->blade->render('backend/main/layout/posts/list', [
            'lang' => $this->postsLang,
            'posts' => array_reverse($postsToShow),
            'users' => $this->users,
            'status' => 'approved',
            'user_id' => $this->userId,
        ]);

        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadBackendHeader(),
        ]);
    }

    public function showAuthors()
    {
        $authorsToShow = $this->authors->get();

        $view = $this->blade->render('backend/main/layout/authors/list', [
            'lang' => $this->authorsLang,
            'authors' => $authorsToShow,
            'status' => 'approved',
            'user_id' => $this->userId,
        ]);

        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }

    public function postSingle(int $itemId)
    {
        $post = current($this->posts->get(['id' => $itemId, 'status' => 'approved']));
        if (empty($post)) {
            exit('Post does not exist.');
        }
        $postComments = loadModel(PostComments::class);
        $replyPostComments = loadModel(ReplyPostComments::class);
        $postSingle = current($this->pageViews->get(['page_name' => 'post_single']));
        $this->pageViews->update(['page_name' => 'post_single'], ['views' => $postSingle->views + 1]);
        $liked = false;
        if (!empty(current($this->likedPosts->get(['post_id' => $itemId, 'user_id' => $this->userId])))) {
            $liked = true;
        }
        $user = current($this->users->get(['id' => $post->user_id]));
        $category = current($this->postCats->get(['id' => $post->post_category_id]));
        $this->posts->update(['id' => $itemId], ['views' => $post->views + 1]);
        echo $this->blade->render('frontend/main/post', [
            'view' => $this->blade,
            'post' => $post,
            'ownerUser' => $user,
            'category' => $category,
            'comments' => $postComments->get(['post_id' => $itemId, 'status' => 'approved']),
            'users' => $this->users,
            'liked' => $liked,
            'replyComments' => $replyPostComments,
            'action' => 'posts/' . $post->id . '/add-comment',
            'header' => $this->loadFrontendHeader(),
        ]);
    }

    public function showPodcasts()
    {
        $podcasts = $this->podcasts->get(['status' => 'approved']);
        $podcastsPage = current($this->pageViews->get(['page_name' => 'podcasts']));
        $this->pageViews->update(['page_name' => 'podcasts'], ['views' => $podcastsPage->views + 1]);
        echo $this->blade->render('frontend/main/podcasts', [
            'view' => $this->blade,
            'episodes' => array_reverse($podcasts),
            'users' => $this->users,
            'episodeNum' => count($podcasts),
        ]);
    }

    public function podcastSingle(int $itemId)
    {
        $episode = current($this->podcasts->get(['id' => $itemId]));
        if (empty($episode)) {
            exit('episode not found');
        }
        $this->podcasts->update(['id' => $itemId], ['views' => $episode->views + 1]);
        $podcastSingle = current($this->pageViews->get(['page_name' => 'podcast_single']));
        $this->pageViews->update(['page_name' => 'podcast_single'], ['views' => $podcastSingle->views + 1]);
        $comments = loadModel(PodcastComments::class);
        $replyComments = loadModel(ReplyPodcastComments::class);
        $publisher = current($this->users->get(['id' => $episode->user_id]));
        echo $this->blade->render('frontend/main/podcast-single', [
            'view' => $this->blade,
            'episode' => $episode,
            'header' => $this->loadFrontendHeader(),
            'publisher' => $publisher,
            'comments' => $comments->get(['podcast_id' => $itemId]),
            'users' => $this->users,
            'action' => '/podcasts/' . $itemId . '/add-comment',
            'reply' => '0',
            'replyComments' => $replyComments,
        ]);
    }

    public function aaronBook()
    {
        echo $this->blade->render('frontend/main/layout/aaron-book', [
            ''
        ]);
    }
}
