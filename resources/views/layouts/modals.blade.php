
@if (Route::is('home'))
        <!-- Modal create story START -->
        <div class="modal fade" id="modalCreateStory" tabindex="-1" aria-labelledby="modalLabelCreateStory" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content overflow-x-hidden overflow-y-scroll">
                    <div id="newStory">
                        <!-- Modal story header START -->
                        <div class="modal-header pb-0 border-bottom-0"></div>
                        <!-- Modal story header END -->

                        <!-- Modal story body START -->
                        <div class="modal-body p-0 overflow-x-hidden">
                            <button type="button" class="btn-close btn-secondary-soft p-3 rounded-circle position-fixed" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')" style="top: 10px; right: 20px;"></button>
                            <button id="upload-record" class="btn btn-danger rounded-pill px-2 py-0 rounded-circle position-fixed d-none" style="top: 10px; right: 20px; width: 45px; height: 45px; z-index: 10;" data-bs-toggle="tooltip" title="@lang('miscellaneous.public.home.stories.commands.return')">
                                <i class="bi bi-arrow-left-short fs-3 align-middle"></i>
                            </button>
                            <div class="mb-1 position-fixed" style="top: 10px; left: 20px;">
                                <!-- All commands to edit story -->
                                <div class="commands">
                                    <div class="d-inline-block me-2">
                                        <button id="upload-record" class="btn btn-sm btn-warning rounded-pill rounded-circle" style="padding: 9px 14px 10px 14px;">
                                            <i class="bi bi-upload fs-6 me-lg-1 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.commands.upload_record')</span>
                                        </button>
                                    </div>
                                    <div class="d-inline-block me-2">
                                        <button id="add-text" class="btn btn-sm btn-warning rounded-pill rounded-circle" style="padding: 9px 13px 10px 13px;">
                                            <i class="bi bi-input-cursor-text fs-6 me-lg-1 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.commands.add_text')</span>
                                        </button>
                                    </div>
                                    <div class="d-inline-block me-2">
                                        <button id="edit-image" class="btn btn-sm btn-warning rounded-pill rounded-circle" style="padding: 9px 13px 10px 13px;">
                                            <i class="bi bi-pencil-fill fs-6 me-lg-1 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.commands.edit')</span>
                                        </button>
                                    </div>
                                    <div class="d-inline-block me-2">
                                        <button id="object" class="btn btn-sm btn-warning rounded-pill rounded-circle" style="padding: 9px 13px 10px 13px;">
                                            <i class="bi bi-emoji-smile fs-6 me-lg-1 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.commands.object')</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Upload or record image -->
                                <div class="upload-record d-none">
                                    <div class="d-inline-block me-2">
                                        <label role="button" for="photo_story" class="btn btn-sm btn-primary rounded-pill rounded-circle" style="padding: 9px 13px 10px 13px;">
                                            <i class="bi bi-image fs-6 me-lg-1 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.type.photo')</span>
                                            <input type="file" name="photo_story" id="photo_story" class="d-none">
                                        </label>
                                        <input type="hidden" name="data_photo_story" id="data_photo_story">
                                    </div>
                                    <div class="d-inline-block me-2">
                                        <label role="button" for="video_story" class="btn btn-sm btn-primary rounded-pill rounded-circle" style="max-height: 43px; padding: 7px 11px 10px 11px;">
                                            <i class="bi bi-play-fill fs-5 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.type.video')</span>
                                            <input type="file" name="video_story" id="video_story" class="d-none">
                                        </label>
                                        <input type="hidden" name="data_video_story" id="data_video_story">
                                    </div>
                                    <div class="d-inline-block me-2">
                                        <button id="camera_story" class="btn btn-sm btn-primary rounded-pill rounded-circle" style="padding: 10px 13px 10px 13px;">
                                            <i class="bi bi-camera-video fs-6 me-lg-1 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.type.camera')</span>
                                        </button>
                                    </div>
                                    <div class="d-inline-block me-2">
                                        <button id="live_story" class="btn btn-sm btn-primary rounded-pill rounded-circle" style="padding: 10px 13px 10px 13px;">
                                            <i class="bi bi-broadcast fs-6 me-lg-1 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.type.live')</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Edit text -->
                                <div class="add-text d-flex justify-content-center align-items-center flex-column position-fixed w-100 pe-lg-3 d-none" style="background: rgba(10, 10, 10, 0.5); height: 110vh; top: -20px; left: 0; z-index: 9;">
                                    <div id="text-tools" class="mb-3">
                                        <button class="btn text-white p-0 text_left" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.left')">
                                            <i class="bi bi-text-left fs-3"></i>
                                        </button>
                                        <button class="btn text-success mx-1 p-0 text_center" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.center')">
                                            <i class="bi bi-text-center fs-3"></i>
                                        </button>
                                        <button class="btn text-white p-0 text_right" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.right')">
                                            <i class="bi bi-text-right fs-3"></i>
                                        </button>
                                        <button class="btn text-white mx-1 p-0 text_bold" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.bold')">
                                            <i class="bi bi-type-bold fs-3"></i>
                                        </button>
                                        <button class="btn text-white p-0 text_italic" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.italic')">
                                            <i class="bi bi-type-italic fs-3"></i>
                                        </button>
                                        <button class="btn text-white mx-1 p-0 text_underline" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.underline')">
                                            <i class="bi bi-type-underline fs-3"></i>
                                        </button>
                                        <button class="btn text-white p-0 text_strikethrough" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.strikethrough')">
                                            <i class="bi bi-type-strikethrough fs-3"></i>
                                        </button>
                                        <button class="btn text-white p-0 text_uppercase" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.lowercase')">
                                            <i class="bi bi-type fs-3"></i>
                                        </button>
                                    </div>
                                    <textarea id="story-textarea" class="bg-transparent mb-3 border-0 text-center fs-4" placeholder="@lang('miscellaneous.edit_text.placeholder')" style="max-width: 300px; max-height: 200px;"></textarea>
                                    <button class="btn btn-primary">@lang('miscellaneous.register')</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-sm-5 mx-auto">
                                    <div id="storyCanvas" class="p-3">
                                        <img src="{{ asset('assets/img/story-placeholder.png') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal story body END -->

                        <!-- Modal story footer -->
                        <div class="modal-footer row d-flex justify-content-center pt-0 border-0">
                            <div class="col-lg-3 col-sm-5 mx-auto">
                                <button id="sendStory" class="btn w-100 btn-success-soft border-0 disabled" data-bs-dismiss="modal" aria-label="Register">
                                    <i class="fa fa-paper-plane me-2"></i>@lang('miscellaneous.post')
                                </button>
                            </div>
                        </div>
                        <!-- Modal story footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal create story END -->
@endif

        <!-- Modal create post START -->
        <div class="modal fade" id="modalCreatePost" tabindex="-1" aria-labelledby="modalLabelCreatePost" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content overflow-x-hidden overflow-y-auto">
                    <form id="newPost">
                        <!-- Modal post header START -->
                        <div class="modal-header pb-0 border-bottom-0">
                            <button type="button" class="btn-close btn-secondary-soft p-3 rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal post header END -->

                        <!-- Modal post body START -->
                        <div class="modal-body pt-3">
                            <!-- Check One Post Type -->
                            <div id="newPostType" class="d-flex justify-content-sm-between justify-content-center flex-sm-row flex-column mb-3 px-3 py-2 border rounded-pill text-sm-start text-center">
                                <span class="d-inline-block">@lang('miscellaneous.public.home.posts.choose_type')</span>
                                <div class="ps-sm-0 ps-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="post-type" id="postProduct" value="product" checked>
                                        <label role="button" class="form-check-label" for="postProduct">
                                            @lang('miscellaneous.public.home.posts.type.product')
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="post-type" id="postService" value="service">
                                        <label role="button" class="form-check-label" for="postService">
                                            @lang('miscellaneous.public.home.posts.type.service')
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Add Post Text -->
                            <div class="d-flex mb-3">
                                <!-- Avatar -->
                                <div class="avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="{{ asset($current_user['profile_photo_path']) }}" alt>
                                </div>
                                <!-- Post box  -->
                                <div class="w-100">
                                    <textarea id="post-textarea" class="form-control pe-4 fs-3 lh-1 border-0" rows="3" placeholder="@lang('miscellaneous.public.home.posts.write')" onkeyup="unableSubmit(this);" autofocus></textarea>
                                </div>
                            </div>

                            <!-- Other Post Data -->
                            <div class="hstack gap-2 justify-content-center">
                                <a class="icon-md bg-success bg-opacity-10 rounded-circle text-success" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('miscellaneous.public.home.posts.other_data.image')">
                                    <i class="bi bi-image"></i>
                                </a>
                                <a class="icon-md bg-info bg-opacity-10 rounded-circle text-info" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('miscellaneous.public.home.posts.other_data.document')">
                                    <i class="bi bi-file-earmark-text"></i>
                                </a>
                                <a class="icon-md bg-danger bg-opacity-10 rounded-circle text-danger" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('miscellaneous.public.home.posts.other_data.location')">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </a>
                                <a class="icon-md bg-warning bg-opacity-10 rounded-circle text-warning" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('miscellaneous.public.home.posts.other_data.emoji')">
                                    <i class="bi bi-emoji-smile-fill"></i>
                                </a>
                            </div>

                            <!-- Select Post categories -->
                            <div class="mt-3 text-center p-3 border rounded-5">
                                <h6 class="fw-light product-type-title">@lang('miscellaneous.public.home.posts.choose_category', ['post_type' => strtolower($categories_product_type['type_name'])])</h6>
                                <h6 class="fw-light service-type-title d-none">@lang('miscellaneous.public.home.posts.choose_category', ['post_type' => strtolower($categories_service_type['type_name'])])</h6>

                                <div id="productCategories">
@foreach ($categories_product as $category)
                                    <input type="radio" class="btn-check" id="check-category-product-{{ $category['id'] }}" name="check-category" autocomplete="off" value="{{ $category['id'] }}">
                                    <label for="check-category-product-{{ $category['id'] }}" class="btn btn-secondary-soft m-2 rounded-pill" style="font-size: 10pt;">{{ $category['category_name'] }}</label>
@endforeach
                                </div>

                                <div id="serviceCategories" class="d-none">
@foreach ($categories_service as $category)
                                    <input type="radio" class="btn-check" id="check-category-service-{{ $category['id'] }}" name="check-category" autocomplete="off" value="{{ $category['id'] }}">
                                    <label for="check-category-service-{{ $category['id'] }}" class="btn btn-secondary-soft m-2 rounded-pill" style="font-size: 10pt;">{{ $category['category_name'] }}</label>
@endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Modal post body END -->

                        <!-- Modal post footer -->
                        <div class="modal-footer px-3">
                            <!-- Select visibility -->
                            <div class="row g-0 d-flex justify-content-between">
                                <div id="visibility" class="col-sm-2 col-3">
                                    <input type="hidden" name="post-visibility" id="post-visibility" value="{{ $everybody_visibility->id }}">
                                    <div class="dropdown d-inline-block" title="@lang('miscellaneous.public.home.posts.choose_visibility.title')" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                        <a role="button" class="text-secondary dropdown-toggle btn btn-secondary-soft py-1 px-2 rounded-pill" id="toggleVisibility" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="{{ $everybody_visibility->icon_font }} fs-6"></i>
                                        </a>

                                        <!-- Visibility dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="toggleVisibility">
                                            <li>
                                                <span class="dropdown-item">
                                                    <h5>@lang('miscellaneous.public.home.posts.choose_visibility.title')</h5>
                                                    <p class="m-0 text-secondary" style="white-space: normal;">@lang('miscellaneous.public.home.posts.choose_visibility.description')</p>
                                                </span>
                                            </li>
                                            <li class="dropdown-divider"></li>
@foreach ($post_visibilities as $visibility)
                                            <li>
                                                <a role="button" id="visibility-{{ $visibility['id'] }}" class="dropdown-item{{ $visibility['alias'] == 'everybody' ? ' active' : '' }}" data-icon="{{ $visibility['icon_font'] }}" data-alias="{{ $visibility['alias'] }}">
                                                    <span class="d-inline-block align-middle" style="width: 30px;"><i class="{{ $visibility['icon_font'] }}"></i></span>
                                                    <span class="d-inline-block align-middle text-truncate" style="width: 210px;">{{ $visibility['visibility_name'] }}</span>
                                                    <span class="d-inline-block align-middle opacity-{{ $visibility['alias'] == 'everybody' ? '100' : '0' }} is-checked" style="width: 20px;"><i class="bi bi-check fs-5"></i></span>
                                                </a>
                                            </li>
@endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="col-sm-10 col-9 text-sm-end">
                                <button class="send-post btn d-block w-100 btn-primary-soft disabled">
                                    <i class="bi bi-send me-1"></i> @lang('miscellaneous.post')
                                </button>
                            </div>
                        </div>
                        <!-- Modal post footer -->
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal create post END -->

        <!-- Modal select restrictions START -->
        <div class="modal fade" id="modalSelectRestrictions" tabindex="-1" aria-labelledby="modalLabelSelectRestrictions" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content overflow-x-hidden overflow-y-auto">
                    <form id="newPost">
                        <!-- Modal post header START -->
                        <div class="modal-header pb-0 border-bottom-0">
                            <button type="button" class="btn-close btn-secondary-soft p-3 rounded-circle" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                        </div>
                        <!-- Modal post header END -->

                        <!-- Modal post body START -->
                        <div class="modal-body pt-3">
                            <!-- Users list -->
                            <div class="user-list" style="max-height: 400px; overflow-y: auto;">
                                <!-- Users will be loaded here -->
                            </div>

                            <!-- Indicative loading -->
                            <div class="text-center loading-spinner" style="display: none;">
                                <div class="spinner-grow text-primary" role="status">
                                    <span class="visually-hidden">@lang('miscellaneous.loading')</span>
                                </div>
                            </div>
                        </div>
                        <!-- Modal post body END -->

                        <!-- Modal post footer -->
                        <div class="modal-footer border-0 d-flex justify-content-center">
                            <button id="cancelRestriction" type="button" class="btn btn-secondary" data-bs-target="#modalCreatePost" data-bs-toggle="modal">@lang('miscellaneous.cancel')</button>
                            <button type="button" class="btn btn-primary" data-bs-target="#modalCreatePost" data-bs-toggle="modal">@lang('miscellaneous.register')</button>                    
                        </div>
                        <!-- Modal post footer -->
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal select restrictions END -->
