        <script type="text/javascript">
            /**
             * Injected data
             */
            window.Laravel = {
                lang: {
                    empty_list: "@lang('miscellaneous.empty_list')",
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
                },
            };
        </script>
