        <script type="text/javascript">
            /**
             * Injected data
             */
            window.Laravel = {
                lang: {
                    empty_list: "@lang('miscellaneous.empty_list')",
                    error_label: "@lang('miscellaneous.error_label')",
                    upload: {
                        use_camera: "@lang('miscellaneous.upload.use_camera')",
                        upload_file: "@lang('miscellaneous.upload.upload_file')",
                        choose_existing_file: "@lang('miscellaneous.upload.choose_existing_file')",
                        image_error: "@lang('miscellaneous.upload.image_error')",
                        document_error: "@lang('miscellaneous.upload.document_error')",
                    },
                    public: {
                        errors: {
                            number: "@lang('miscellaneous.public.errors.number')",
                        },
                        events: {
                            new: {
                                data: {
                                    speakers: "@lang('miscellaneous.public.events.new.data.speakers')",
                                },
                            },
                        },
                    },
                    menu: {
                        news_feed: "@lang('miscellaneous.menu.public.news_feed')",
                        home: "@lang('miscellaneous.menu.home')",
                        discover: "@lang('miscellaneous.menu.discover')",
                        orders: "@lang('miscellaneous.menu.public.orders.title')",
                        notifications: "@lang('miscellaneous.menu.notifications.title')",
                        communities: "@lang('miscellaneous.menu.public.communities.title')",
                        events: "@lang('miscellaneous.menu.public.events.title')",
                        messages: "@lang('miscellaneous.menu.messages')",
                    },
                },
                data: {
                    user: @json($current_user),
                    ipinfo: @json($ipinfo_data),
                    draft_status: @json($draft_status),
                    operational_status: @json($operational_status),
                    boosted_status: @json($boosted_status),
                    deleted_status: @json($deleted_status),
                    everybody_visibility: @json($everybody_visibility),
                    everybody_except_visibility: @json($everybody_except_visibility),
                    nobody_except_visibility: @json($nobody_except_visibility),
                },
            };
        </script>
