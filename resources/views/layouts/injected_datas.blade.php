        <script type="text/javascript">
            /**
             * Injected data
             */
            window.Laravel = {
                lang: {
                    empty_list: "@lang('miscellaneous.empty_list')",
                    see_more: "@lang('miscellaneous.see_more')",
                    error_label: "@lang('miscellaneous.error_label')",
                    delete: "@lang('miscellaneous.delete')",
                    loading: "@lang('miscellaneous.loading')",
                    like: "@lang('miscellaneous.like')",
                    share: "@lang('miscellaneous.share')",
                    send: "@lang('miscellaneous.send')",
                    follow: "@lang('miscellaneous.follow')",
                    unfollow: "@lang('miscellaneous.unfollow')",
                    send_message: "@lang('miscellaneous.send_message')",
                    message: "@lang('miscellaneous.message')",
                    followed: "@lang('miscellaneous.followed')",
                    upload: {
                        use_camera: "@lang('miscellaneous.upload.use_camera')",
                        upload_file: "@lang('miscellaneous.upload.upload_file')",
                        choose_existing_file: "@lang('miscellaneous.upload.choose_existing_file')",
                        image_error: "@lang('miscellaneous.upload.image_error')",
                        document_error: "@lang('miscellaneous.upload.document_error')",
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
                        profile: {
                            title: "@lang('miscellaneous.menu.public.profile.title')",
                            products: "@lang('miscellaneous.menu.public.profile.products')",
                            services: "@lang('miscellaneous.menu.public.profile.services')",
                            connections: "@lang('miscellaneous.menu.public.profile.connections')",
                            my_activities: "@lang('miscellaneous.menu.public.profile.my_activities')",
                        },
                    },
                    public: {
                        reactions: "@lang('miscellaneous.public.home.reactions')",
                        comments: "@lang('miscellaneous.public.home.comments')",
                        shares: "@lang('miscellaneous.public.home.shares')",
                        errors: {
                            number: "@lang('miscellaneous.public.errors.number')",
                        },
                        profile: {
                            statistics: {
                                post: "@lang('miscellaneous.public.profile.statistics.injected.post')",
                                posts: "@lang('miscellaneous.public.profile.statistics.injected.posts')",
                                follower: "@lang('miscellaneous.public.profile.statistics.injected.follower')",
                                followers: "@lang('miscellaneous.public.profile.statistics.injected.followers')",
                                following: "@lang('miscellaneous.public.profile.statistics.injected.following')",
                                followings: "@lang('miscellaneous.public.profile.statistics.injected.followings')",
                            },
                        },
                        posts: {
                            posted: {
                                message: "@lang('miscellaneous.public.home.posts.posted.message')",
                                see: "@lang('miscellaneous.public.home.posts.posted.see')",
                            },
                            boost: {
                                title: "@lang('miscellaneous.public.home.posts.boost.title')",
                            },
                            actions: {
                                save: "@lang('miscellaneous.public.home.posts.actions.save')",
                                pin: "@lang('miscellaneous.public.home.posts.actions.pin')",
                                send_via_dm: "@lang('miscellaneous.public.home.posts.actions.send_via_dm')",
                                copy_link: "@lang('miscellaneous.public.home.posts.actions.copy_link')",
                                share_via_: "@lang('miscellaneous.public.home.posts.actions.share_via_')",
                                share_directly: "@lang('miscellaneous.public.home.posts.actions.share_directly')",
                                share_with_opinion: "@lang('miscellaneous.public.home.posts.actions.share_with_opinion')",
                                change_visibility: "@lang('miscellaneous.public.home.posts.actions.change_visibility')",
                                hide: "@lang('miscellaneous.public.home.posts.actions.hide')",
                                report: "@lang('miscellaneous.public.home.posts.actions.report')",
                                update_post: "@lang('miscellaneous.public.home.posts.actions.update_post')",
                                update_audience: "@lang('miscellaneous.public.home.posts.actions.update_audience')",
                                embed_into_website: "@lang('miscellaneous.public.home.posts.actions.embed_into_website')",
                                delete_description: "@lang('miscellaneous.public.home.posts.actions.delete_description')",
                            },
                        },
                        events: {
                            new: {
                                data: {
                                    speakers: "@lang('miscellaneous.public.events.new.data.speakers')",
                                },
                            },
                        },
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
                    reactions: @json($reactions),
                },
            };
        </script>
