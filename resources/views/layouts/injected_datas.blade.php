        <script type="text/javascript">
            /**
             * Injected data
             */
            window.Laravel = {
                lang: {
                    empty_list: @json(@lang('miscellaneous.empty_list')),
                    menu: {
                        home: @json(@lang('miscellaneous.menu.home')),
                        discover: @json(@lang('miscellaneous.menu.discover')),
                        orders: @json(@lang('miscellaneous.menu.public.orders.title')),
                        notifications: @json(@lang('miscellaneous.menu.notifications.title')),
                        communities: @json(@lang('miscellaneous.menu.public.communities.title')),
                        events: @json(@lang('miscellaneous.menu.public.events.title')),
                        messages: @json(@lang('miscellaneous.menu.messages')),
                    },
                },
                data: {
                    user: @json($current_user),
                    ipinfo: @json($ipinfo_data),
                },
            };
        </script>
