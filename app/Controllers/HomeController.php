<?php

namespace App\Controllers;

use App\Model\Authors;
use App\Models\Categories;
use App\Models\LikedPosts;
use App\Models\PodcastComments;
use App\Models\Podcasts;
use App\Models\PostCategories;
use App\Models\Posts;
use App\Models\ReplyPodcastComments;
use App\Models\Users;
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

    public function __construct()
    {
        $this->blade = $this->view()->blade();
        $this->posts = loadModel(Posts::class);
        $this->users = loadModel(Users::class);
        $this->authors = loadModel(Authors::class);
        $this->categories = loadModel(Categories::class);
        if (isset($_SESSION['USERID'])) {
            $this->userId = $_SESSION['USERID'];
        }
        $lang = ConfigHelper::getConfig('default-language');
        $this->postsLang = loadLang($lang, 'posts');
        $this->authorsLang = loadLang($lang, 'authors');
        $this->postCats = loadModel(PostCategories::class);
        $this->podcasts = loadModel(Podcasts::class);
        $this->likedPosts = loadModel(LikedPosts::class);
    }

    public function frontEnd()
    {
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
            'posts' => $postsToShow,
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
        $liked = false;
        if (!empty(current($this->likedPosts->get(['post_id' => $postId, 'user_id' => $this->userId])))) {
            $liked = true;
        }
        $post = current($this->posts->get(['id' => $itemId , 'status' => 'approved']));
        $user = current($this->users->get(['id' => $post->user_id]));
        $category = current($this->postCats->get(['id' => $post->post_category_id]));
        echo $this->blade->render('frontend/main/post', [
            'view' => $this->blade,
            'post' => $post,
            'user' => $user,
            'liked' => $liked,
            'category' => $category,
        ]);
    }

    public function showPodcasts()
    {
        $podcasts = $this->podcasts->get(['status' => 'approved']);
        echo $this->blade->render('frontend/main/podcasts', [
            'view' => $this->blade,
            'episodes' => array_reverse($podcasts),
            'users' => $this->users,
            'episodeNum' => count($podcasts),
        ]);
    }

    public function podcastSingle(int $itemId)
    {
        $comments = loadModel(PodcastComments::class);
        $replyComments = loadModel(ReplyPodcastComments::class);
        $episode = current($this->podcasts->get(['id' => $itemId]));
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
}
