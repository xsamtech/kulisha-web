
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
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="newPost">
                        <!-- Modal post header START -->
                        <div class="modal-header d-block position-relative text-center">
                            <button type="button" class="btn-close btn-secondary-soft-hover p-3 rounded-circle position-absolute" style="top: 1rem; right: 1rem;" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                            <h4 class="product-type-title modal-title m-0">@lang('miscellaneous.public.home.posts.new.title', ['post_type' => strtolower($categories_product_type['type_name'])])</h4>
                            <h4 class="service-type-title modal-title m-0 d-none">@lang('miscellaneous.public.home.posts.new.title', ['post_type' => strtolower($categories_service_type['type_name'])])</h4>
                        </div>
                        <!-- Modal post header END -->

                        <!-- Modal post body START -->
                        <div class="modal-body pt-3 overflow-x-hidden overflow-y-auto">
                            <!-- Check One Post Type -->
                            <div id="newPostType" class="d-flex justify-content-sm-between justify-content-center flex-sm-row flex-column mb-3 px-3 py-2 border rounded-pill text-sm-start text-center">
                                <span class="d-inline-block">@lang('miscellaneous.public.home.posts.choose_type')</span>
                                <div class="ps-sm-0 ps-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="post-type" id="postProduct" value="product">
                                        <label role="button" class="form-check-label" for="postProduct">
                                            @lang('miscellaneous.public.home.posts.type.product')
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="post-type" id="postService" value="service" checked>
                                        <label role="button" class="form-check-label" for="postService">
                                            @lang('miscellaneous.public.home.posts.type.service')
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Images input -->
                            <input type="file" name="images[]" id="imagesInput" multiple class="d-none" onchange="toggleSubmitFiles(this.id);">
                            <!-- Document input -->
                            <input type="file" name="documents[]" id="documentsInput" multiple class="d-none" onchange="toggleSubmitFiles(this.id);">
                            <!-- Location -->
                            <input type="hidden" name="latitude" id="latitude" value="">
                            <input type="hidden" name="longitude" id="longitude" value="">
                            <input type="hidden" name="city" id="city" value="">
                            <input type="hidden" name="region" id="region" value="">
                            <input type="hidden" name="country" id="country" value="">

                            <!-- A spinner before previews -->
                            <div id="previewsSpinner" class="spinner-grow d-none float-end" role="status">
                                <span class="visually-hidden">@lang('miscellaneous.loading')</span>
                            </div>

                            <!-- Images previews -->
                            <div id="imagesPreviews" class="pt-3 d-none"></div>

                            <!-- Images previews -->
                            <div id="documentsPreviews" class="pt-3 d-none"></div>

                            <!-- Add Post Text -->
                            <div class="d-flex my-3">
                                <!-- Avatar -->
                                <div class="avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="{{ asset($current_user['profile_photo_path']) }}" alt>
                                </div>
                                <!-- Post box  -->
                                <div class="w-100">
                                    <textarea id="post-textarea" class="form-control pe-4 fs-3 lh-1 border-0" rows="3" placeholder="@lang('miscellaneous.public.home.posts.write')" onkeyup="toggleSubmitText(this, 'post');" autofocus></textarea>
                                </div>
                            </div>

                            <!-- Location info -->
                            <div id="locationInfo" class="mb-3 text-center"></div>

                            <!-- Other Post Data -->
                            <div class="hstack gap-2 justify-content-center position-relative">
                                <a role="button" id="uploadImages" class="icon-md bg-success bg-opacity-10 rounded-circle text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('miscellaneous.public.home.posts.other_data.image')">
                                    <i class="bi bi-image"></i>
                                </a>
                                <a role="button" id="uploadDocuments" class="icon-md bg-info bg-opacity-10 rounded-circle text-info" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('miscellaneous.public.home.posts.other_data.document')">
                                    <i class="bi bi-file-earmark-text"></i>
                                </a>
                                <a role="button" id="detectLocation" class="icon-md bg-danger bg-opacity-10 rounded-circle text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('miscellaneous.public.home.posts.other_data.location')">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </a>
                                <a role="button" id="selectEmoji" class="icon-md bg-warning bg-opacity-10 rounded-circle text-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('miscellaneous.public.home.posts.other_data.emoji')">
                                    <i class="bi bi-emoji-smile-fill"></i>
                                </a>

                                <!-- Emoji dropdown -->
                                <div id="emojiDropdown" class="emoji-dropdown rounded top-0 end-0 text-center">
                                    <div class="spinner-grow my-3" role="status">
                                        <span class="visually-hidden">@lang('miscellaneous.loading')</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Select Post categories -->
                            <div class="mt-3 text-center p-3 border rounded-5">
                                <h6 class="fw-light product-type-title">@lang('miscellaneous.public.home.posts.choose_category', ['post_type' => strtolower($categories_product_type['type_name'])])</h6>
                                <h6 class="fw-light service-type-title d-none">@lang('miscellaneous.public.home.posts.choose_category', ['post_type' => strtolower($categories_service_type['type_name'])])</h6>

                                <div id="productCategories" class="d-none">
@foreach ($categories_product as $category)
                                    <input type="radio" class="btn-check" id="check-category-product-{{ $category['id'] }}" name="check-category" autocomplete="off" value="{{ $category['id'] }}">
                                    <label for="check-category-product-{{ $category['id'] }}" class="btn btn-secondary-soft m-2 rounded-pill" style="font-size: 10pt;">{{ $category['category_name'] }}</label>
@endforeach
                                </div>

                                <div id="serviceCategories">
@foreach ($categories_service as $category)
                                    <input type="radio" class="btn-check" id="check-category-service-{{ $category['id'] }}" name="check-category" autocomplete="off" value="{{ $category['id'] }}">
                                    <label for="check-category-service-{{ $category['id'] }}" class="btn btn-secondary-soft m-2 rounded-pill" style="font-size: 10pt;">{{ $category['category_name'] }}</label>
@endforeach
                                </div>
                            </div>

                        </div>
                        <!-- Modal post body -->

                        <!-- Modal post footer -->
                        <div class="modal-footer d-block pt-0 border-0">
                            <!-- Select visibility -->
                            <div class="row g-0">
                                <div id="restrictions" class="col-12 mt-3 d-none">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="users-list"></div>
                                        <a role="button" id="retry-select-restrictions" class="d-inline-block ms-2">
                                            <i class="fa-solid fa-pencil"></i> @lang('miscellaneous.restart')
                                        </a>
                                    </div>
                                </div>
                                <div id="visibility" class="col-sm-2 col-3 mt-3">
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

                                <!-- Button -->
                                <div class="col-sm-10 col-9 mt-3">
                                    <button type="submit" class="send-post btn d-block w-100 btn-primary-soft disabled">
                                        <i class="bi bi-send me-1"></i> @lang('miscellaneous.post')
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Modal post footer -->
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal create post END -->

        <!-- Modal select restrictions START -->
        <div class="modal fade" id="modalSelectRestrictions" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content overflow-x-hidden overflow-y-auto">
                    <form id="chooseFollowers">
                        <!-- Modal restrictions header START -->
                        <div class="modal-header p-0 border-bottom-0">
                        </div>
                        <!-- Modal restrictions header END -->

                        <!-- Modal restrictions body START -->
                        <div class="modal-body pt-3">
                            <h6 class="h6 mb-4 text-center fw-normal">@lang('miscellaneous.public.home.among_followers')</h6>

                            <!-- Users list -->
                            <div class="users-list" style="max-height: 370px; overflow-y: auto;">
                                <!-- Users will be loaded here -->
                            </div>
                        </div>
                        <!-- Modal restrictions body END -->

                        <!-- Modal restrictions footer -->
                        <div class="modal-footer border-0 d-flex justify-content-between">
                            <button id="cancelRestriction" type="button" class="btn btn-secondary-soft-hover" data-bs-dismiss="modal">@lang('miscellaneous.cancel')</button>
                            <!-- Indicative loading -->
                            <div class="text-center loading-spinner opacity-0">
                                <div class="spinner-grow spinner-grow-sm text-primary" role="status">
                                    <span class="visually-hidden">@lang('miscellaneous.loading')</span>
                                </div>
                            </div>
                            <button type="submit" id="sendCheckedUsers1" class="btn btn-primary-soft disabled" data-bs-dismiss="modal">@lang('miscellaneous.register')</button>                    
                        </div>
                        <!-- Modal restrictions footer -->
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal select restrictions END -->

        <!-- Modal location permission START -->
        <div class="modal fade" id="allowLocationModal" tabindex="-1" aria-labelledby="allowLocationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <!-- Modal location header START -->
                    <div class="modal-header">
                        <h5 class="modal-title m-0" id="allowLocationModalLabel"><i class="bi bi-geo-alt me-2"></i>@lang('miscellaneous.public.home.posts.location_detection.title')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                    </div>
                    <!-- Modal location header END -->

                    <!-- Modal location body START -->
                    <div class="modal-body text-center">
                        <p class="small">@lang('miscellaneous.public.home.posts.location_detection.security_info')</p>
                        <p class="m-0">@lang('miscellaneous.public.home.posts.location_detection.description')</p>
                    </div>
                    <!-- Modal location body END -->

                    <!-- Modal location footer START -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary-soft-hover" data-bs-dismiss="modal">@lang('miscellaneous.no')</button>
                        <button type="button" id="allow-location-btn" class="btn btn-primary">@lang('miscellaneous.yes')</button>
                    </div>
                    <!-- Modal location footer END -->
                </div>
            </div>
        </div>
        <!-- Modal location permission END -->

        <!-- Modal new event START -->
        <div class="modal fade" id="newEventModal" tabindex="-1" aria-labelledby="newEventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="newEvent">
                        <!-- Modal event header START -->
                        <div class="modal-header d-block position-relative text-center">
                            <button type="button" class="btn-close btn-secondary-soft-hover p-3 rounded-circle position-absolute" style="top: 1rem; right: 1rem;" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                            <h4 class="modal-title m-0" id="newEventModalLabel">@lang('miscellaneous.public.events.new.title')</h4>
                        </div>
                        <!-- Modal event header END -->

                        <!-- Modal event body START -->
                        <div class="modal-body p-0 overflow-x-hidden overflow-y-auto">
                            <div id="coverImageWrapper" class="position-relative overflow-hidden" style="max-height: 200px;">
                                <img src="{{ asset('assets/img/cover-placeholder-black-transparent.png') }}" alt="" class="cover-image img-fluid rounded-0">
                                <div class="position-absolute w-100" style="bottom: 0.7rem; padding: 0 0.7rem;">
                                    <label role="button" for="image_cover" class="btn btn-dark p-0 float-end" style="padding: 3px 4px 3px 3px!important;">
                                        <i class="bi bi-file-earmark-plus me-2 align-middle fs-5"></i>@lang('miscellaneous.add')
                                        <input type="file" name="image_cover" id="image_cover" class="d-none">
                                    </label>
                                    <input type="hidden" name="data_cover" id="data_cover">
                                </div>
                            </div>
                            <div class="p-3">
                                <!-- Event title -->
                                <div class="form-floating mb-3">
                                    <input type="text" name="event_title" id="event_title" class="form-control form-counter" maxlength="100" placeholder="@lang('miscellaneous.public.events.new.data.event_title.label')">
                                    <label for="event_title">@lang('miscellaneous.public.events.new.data.event_title.label')</label>
                                </div>

                                <!-- Is virtual -->
                                <div id="isVirtual" class="p-3 mb-3 rounded border text-center">
@foreach ($access_types as $type)
    @if ($type['alias'] === 'access_public')
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="type_id" id="type_id-{{ $type['id'] }}" class="form-check-input" value="{{ $type['id'] }}" checked>
                                        <label role="button" class="form-check-label" for="type_id-{{ $type['id'] }}">@lang('miscellaneous.public.events.new.data.access_type.public')</label>
                                    </div>
    @else
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="type_id" id="type_id-{{ $type['id'] }}" class="form-check-input" value="{{ $type['id'] }}">
                                        <label role="button" class="form-check-label" for="type_id-{{ $type['id'] }}">@lang('miscellaneous.public.events.new.data.access_type.private')</label>
                                    </div>
    @endif
@endforeach
                                </div>

                                <!-- Event place -->
                                <div class="form-floating mb-3">
                                    <input type="text" name="event_place" id="event_place" class="form-control" placeholder="@lang('miscellaneous.public.events.new.data.place')">
                                    <label for="event_place">@lang('miscellaneous.public.events.new.data.place')</label>
                                </div>

                                <!-- Event description -->
                                <div class="form-floating mb-3">
                                    <textarea name="event_descritpion" id="event_descritpion" class="form-control" placeholder="@lang('miscellaneous.public.events.new.data.event_description')"></textarea>
                                    <label for="event_descritpion">@lang('miscellaneous.public.events.new.data.event_description')</label>
                                </div>

                                <!-- Fields -->
                                <div id="choose_fields" class="mb-3 p-3 rounded border">
                                    <p class="small text-center">@lang('miscellaneous.public.events.new.data.fields')</p>
                                    <hr>
                                    <div class="text-center">
@foreach ($all_fields as $field)
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="fields_ids[]" id="fields_ids-{{ $field['id'] }}" class="form-check-input" value="{{ $field['id'] }}"{{ $current_user['last_field']->id == $field['id'] ? ' checked' : ''}}>
                                            <label role="button" class="form-check-label" for="fields_ids-{{ $field['id'] }}">{{ $field['field_name'] }}</label>
                                        </div>
@endforeach
                                    </div>
                                </div>

                                <!-- Start/End date/hour -->
                                <div class="row g-sm-3 mb-3">
                                    <div class="col-sm-6">
                                        <input type="hidden" name="start_at" id="start_at" value="{{ date('Y-m-d H:i') }}">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="date_start" id="date_start" class="form-control" placeholder="@lang('miscellaneous.public.events.new.data.date_start.label')" value="{{ explicitDateTime(date('Y-m-d H:i:s')) }}">
                                            <label for="date_start">@lang('miscellaneous.public.events.new.data.date_start.label')</label>
                                        </div>
                                    </div>
                                    <div id="addEndDateHour" class="col-sm-6">
                                        <a role="button" class="btn btn-link mb-sm-0 mb-1" onclick="event.preventDefault(); document.getElementById('addEndDateHour').classList.add('d-none'); document.getElementById('endDateHour').classList.remove('d-none');">
                                            <i class="bi bi-plus-circle fs-4 me-2 align-middle"></i><small>@lang('miscellaneous.public.events.new.data.date_end.add')</small>
                                        </a>
                                    </div>
                                    <div id="endDateHour" class="col-sm-6 d-none">
                                        <input type="hidden" name="end_at" id="end_at">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="date_end" id="date_end" class="form-control" placeholder="@lang('miscellaneous.public.events.new.data.date_end.label')">
                                            <label for="date_end">@lang('miscellaneous.public.events.new.data.date_end.label')</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-sm-3">
                                    <!-- Timezone -->
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <select name="timezone" id="timezone" class="form-select" aria-label="@lang('miscellaneous.public.events.new.data.timezone')">
@foreach ($timezones as $timezone => $formattedTimezone)
                                                <option value="{{ $timezone }}" {{ $current_user['timezone'] == $timezone ? 'selected' : '' }}>{{ $formattedTimezone }}</option>
@endforeach
                                            </select>
                                            <label for="timezone">@lang('miscellaneous.public.events.new.data.timezone')</label>
                                        </div>
                                    </div>

                                    <!-- Select speackers -->
                                    <div class="col-sm-6">
                                        <a role="button" id="select-speakers" class="btn btn-secondary-soft mt-sm-2 mt-0 w-100">
                                            <i class="bi bi-person-video3 me-2"></i>@lang('miscellaneous.public.events.new.data.speakers')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal event body END -->

                        <!-- Modal event footer START -->
                        <div class="modal-footer d-block border-0">
                            <div id="speackers" class="mb-3 d-none">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="users-list"></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary-soft w-100 send-event disabled">@lang('miscellaneous.public.events.new.run')</button>
                        </div>
                        <!-- Modal event footer END -->
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal new event END -->

        <!-- Modal new poll START -->
        <div class="modal fade" id="pollModal" tabindex="-1" aria-labelledby="pollModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="newPoll">
                        <!-- Modal poll header START -->
                        <div class="modal-header d-block position-relative text-center">
                            <button type="button" class="btn-close btn-secondary-soft-hover p-3 rounded-circle position-absolute" style="top: 1rem; right: 1rem;" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                            <h4 class="modal-title m-0" id="pollModalLabel">@lang('miscellaneous.public.home.posts.type.poll.new')</h4>
                        </div>
                        <!-- Modal poll header END -->

                        <!-- Modal poll body START -->
                        <div class="modal-body p-0 overflow-x-hidden overflow-y-auto">
                            <div class="p-3">
                                <!-- Post data -->
                                <div id="shared_post_data" class="card flex-row mb-3 overflow-hidden d-none">
                                    <img src="{{ asset('assets/img/avatar-placeholder.png') }}" alt="" width="100" class="card-img-left">
                                    <div class="card-body">
                                        <a role="button" id="delete_post" class="float-end"><i class="bi bi-x-lg"></i></a>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi...</p>
                                    </div>
                                </div>
                                <input type="hidden" name="shared_post_id" id="shared_post_id" value="">
                                <div class="input-group mb-3">
                                    <span id="search_poll_post_icon" class="input-group-text border bg-transparent"><i class="bi bi-search"></i></span>
                                    <input type="text" name="search_poll_post" id="search_poll_post" class="form-control ps-0 border-start-0" placeholder="@lang('miscellaneous.public.home.posts.type.poll.search_post')" onfocus="event.preventDefault(); document.getElementById('search_poll_post_icon').classList.add('border-primary');" onblur="event.preventDefault(); document.getElementById('search_poll_post_icon').classList.remove('border-primary');">
                                </div>

                                <!-- Poll description -->
                                <div class="form-floating mb-3">
                                    <textarea name="post_content" id="poll_question" class="form-control" placeholder="@lang('miscellaneous.public.home.posts.type.poll.choice.description')"></textarea>
                                    <label for="poll_question">@lang('miscellaneous.public.home.posts.type.poll.choice.description')</label>
                                </div>

                                <!-- Option 1 -->
                                <div class="input-group mb-3">
                                    <span id="option_1" class="input-group-text">@lang('miscellaneous.public.home.stories.type.poll.choice.option.option1')</span>
                                    <input type="text" name="choices_contents[]" id="choices_contents_1" class="form-control" placeholder="@lang('miscellaneous.public.home.posts.type.poll.choice.option.title')" aria-describedby="option_1" value="@lang('miscellaneous.yes')">
                                </div>

                                <!-- Option 2 -->
                                <div class="input-group mb-3">
                                    <span id="option_2" class="input-group-text">@lang('miscellaneous.public.home.stories.type.poll.choice.option.option2')</span>
                                    <input type="text" name="choices_contents[]" id="choices_contents_2" class="form-control" placeholder="@lang('miscellaneous.public.home.posts.type.poll.choice.option.title')" aria-describedby="option_2" value="@lang('miscellaneous.no')">
                                </div>

                                <!-- Add another option -->
                                <div id="add_option_button" class="text-center">
                                    <a role="button" class="btn btn-link"><i class="bi bi-plus-circle me-2"></i>@lang('miscellaneous.public.home.posts.type.poll.choice.option.add')</a>
                                </div>
                            </div>
                        </div>
                        <!-- Modal poll body END -->

                        <!-- Modal poll footer START -->
                        <div class="modal-footer d-block border-0">
                            <button type="submit" class="btn btn-primary-soft w-100 send-poll disabled">@lang('miscellaneous.register')</button>
                        </div>
                        <!-- Modal poll footer END -->
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal new poll END -->

        <!-- Modal new anonymous question request START -->
        <div class="modal fade" id="anonymousQuestionRequestModal" tabindex="-1" aria-labelledby="anonymousQuestionRequestModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="newAnonymousQuestionRequest">
                        <!-- Modal anonymous question request header START -->
                        <div class="modal-header d-block position-relative pb-0 border-0 text-center">
                            <button type="button" class="btn-close btn-secondary-soft-hover p-3 rounded-circle float-end position-relative" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')" style="z-index: 9999;"></button>
                        </div>
                        <!-- Modal anonymous question request header END -->

                        <!-- Modal anonymous question request body START -->
                        <div class="modal-body pt-0 pb-2">
                            <div class="d-flex justify-content-between mb-1">
                                <div class="flex-grow-0">
                                    <img src="{{ $current_user['profile_photo_path'] }}" alt="" width="50" class="rounded-circle float-start">
                                </div>
                                <div class="flex-fill">
                                    <textarea name="post_content" id="question_request_content" class="form-control bg-transparent border-0 text-center text-primary fs-5 kls-line-height-1_35" placeholder="@lang('miscellaneous.public.home.posts.type.anonymous_question.request_placeholder')" onfocus="this.classList.add('border-0')">@lang('miscellaneous.public.home.posts.type.anonymous_question.request_content')</textarea>
                                </div>
                            </div>
                            <div class="p-3 pb-sm-0 pb-4 bg-light border rounded text-center">
                                <textarea name="comment_content" id="question_content" class="form-control bg-transparent pb-0 border-0 text-center" placeholder="@lang('miscellaneous.public.home.posts.type.anonymous_question.question_placeholder')" onfocus="this.classList.add('border-0')" disabled>@lang('miscellaneous.public.home.posts.type.anonymous_question.question_content')</textarea>
                            </div>
                        </div>
                        <!-- Modal anonymous question request body END -->

                        <!-- Modal anonymous question request footer START -->
                        <div class="modal-footer d-block border-0">
                            <button type="submit" class="btn btn-primary w-100 send-question">@lang('miscellaneous.send')</button>
                        </div>
                        <!-- Modal anonymous question request footer END -->
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal new anonymous question request END -->

        <!-- Modal select speakers START -->
        <div class="modal fade" id="modalSelectSpeakers" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content overflow-x-hidden overflow-y-auto">
                    <form id="chooseFollowers">
                        <!-- Modal speakers header START -->
                        <div class="modal-header p-0 border-bottom-0">
                        </div>
                        <!-- Modal speakers header END -->

                        <!-- Modal speakers body START -->
                        <div class="modal-body pt-3">
                            <h6 class="h6 mb-4 text-center fw-normal">@lang('miscellaneous.public.home.among_connections')</h6>

                            <!-- Users list -->
                            <div class="users-list" style="max-height: 370px; overflow-y: auto;">
                                <!-- Users will be loaded here -->
                            </div>
                        </div>
                        <!-- Modal speakers body END -->

                        <!-- Modal speakers footer -->
                        <div class="modal-footer border-0 d-flex justify-content-between">
                            <button id="cancelRestriction" type="button" class="btn btn-secondary-soft-hover" data-bs-dismiss="modal">@lang('miscellaneous.cancel')</button>
                            <!-- Indicative loading -->
                            <div class="text-center loading-spinner opacity-0">
                                <div class="spinner-grow spinner-grow-sm text-primary" role="status">
                                    <span class="visually-hidden">@lang('miscellaneous.loading')</span>
                                </div>
                            </div>
                            <button type="submit" id="sendCheckedUsers2" class="btn btn-primary-soft disabled" data-bs-dismiss="modal">@lang('miscellaneous.register')</button>                    
                        </div>
                        <!-- Modal speakers footer -->
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal select speakers END -->

        <!-- Modal crop cover START -->
        <div class="modal fade" id="cropModal_cover" tabindex="-1" aria-labelledby="cropModal_coverLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Modal cover header START -->
                    <div class="modal-header d-block position-relative text-center">
                        <button type="button" class="btn-close btn-secondary-soft-hover p-3 rounded-circle position-absolute" style="top: 1rem; right: 1rem;" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                        <h5 class="modal-title m-0" id="cropModal_coverLabel">@lang('miscellaneous.crop_before_save')</h5>
                    </div>
                    <!-- Modal cover header END -->

                    <!-- Modal cover body START -->
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mb-sm-0 mb-4">
                                    <div class="bg-image">
                                        <img src="" id="retrieved_image_cover" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal cover body END -->

                    <!-- Modal cover footer START -->
                    <div class="modal-footer border-0">
                        <button type="button" id="crop_cover" class="btn btn-primary w-100" data-bs-dismiss="modal">@lang('miscellaneous.register')</button>
                    </div>
                    <!-- Modal cover footer END -->
                </div>
            </div>
        </div>
        <!-- Modal crop cover END -->

        <!-- Modal crop avatar START -->
        <div class="modal fade" id="cropModal_avatar" tabindex="-1" aria-labelledby="cropModal_avatarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Modal avatar header START -->
                    <div class="modal-header d-block position-relative text-center">
                        <button type="button" class="btn-close btn-secondary-soft-hover p-3 rounded-circle position-absolute" style="top: 1rem; right: 1rem;" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')"></button>
                        <h5 class="modal-title m-0" id="cropModal_avatarLabel">@lang('miscellaneous.crop_before_save')</h5>
                    </div>
                    <!-- Modal avatar header END -->

                    <!-- Modal avatar body START -->
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mb-sm-0 mb-4">
                                    <div class="bg-image">
                                        <img src="" id="retrieved_image_avatar" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal avatar body END -->

                    <!-- Modal avatar footer START -->
                    <div class="modal-footer border-0">
                        <button type="button" id="crop_avatar" class="btn btn-primary w-100" data-bs-dismiss="modal">@lang('miscellaneous.register')</button>
                    </div>
                    <!-- Modal avatar footer END -->
                </div>
            </div>
        </div>
        <!-- Modal crop avatar END -->
