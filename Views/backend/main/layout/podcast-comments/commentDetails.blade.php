<!-- Popup modal for reviwe START -->
<div class="modal fade" id="viewReview" tabindex="-1" aria-labelledby="viewReviewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="viewReviewLabel">نظرات</h5>
                <button type="button" class="btn btn-sm btn-light text-dark mb-0" data-bs-dismiss="modal"
                        aria-label="Close"><i class="bi bi-x fs-5"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="d-md-flex">
                    <!-- Avatar -->
                    <div class="avatar avatar-md me-4 flex-shrink-0">
                        <img class="avatar-img rounded-circle"
                             src="{{ route('/Others/Themes/Frontend/Theme/assets/images') }} /avatar/04.jpg"
                             alt="avatar">
                    </div>
                    <!-- Text -->
                    <div>
                        <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                            <h5 class="me-3 mb-0">{{ current($users->get(['id' => $comment->user_id]))->first_name . ' ' . current($users->get(['id' => $comment->user_id]))->last_name }}</h5>
                            <!-- Review star -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="far fa-star text-warning"></i></li>
                            </ul>
                        </div>
                        <!-- Info -->
                        <p class="small mb-2">2 روز پیش</p>
                        <p class="mb-2">{{ $comment->text }}</p>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">بستن</button>
            </div>
        </div>
    </div>
</div>
<!-- Popup modal for reviwe END -->