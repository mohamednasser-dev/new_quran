<!DOCTYPE html>
<head>
    <title>Zoom WebSDK</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.1/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.1/css/react-select.css" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>

<body>
    <style>
        .sdk-select {
            height: 34px;
            border-radius: 4px;
        }

        .websdktest button {
            float: right;
            margin-left: 5px;
        }

        #nav-tool {
            margin-bottom: 0px;
        }

        #show-test-tool {
            position: absolute;
            top: 100px;
            left: 0;
            display: block;
            z-index: 99999;
        }

        #display_name {
            width: 250px;
        }


        #websdk-iframe {
            width: 700px;
            height: 500px;
            border: 1px;
            border-color: red;
            border-style: dashed;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            left: 50%;
            margin: 0;
        }
    </style>

    <nav id="nav-tool" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Zoom WebSDK</a>
            </div>
            <div id="navbar" class="websdktest">
                <form class="navbar-form navbar-right" id="meeting_form">
                    <div class="form-group">
                        <input type="hidden" name="display_name" id="display_name" @if(auth()->guard('teacher')->check()) value="{{auth()->guard('teacher')->user()->user_name}}" @else value="{{auth()->guard('student')->user()->user_name}}" @endif maxLength="100" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="meeting_number" id="meeting_number" value="{{$data->meeting_id}}" maxLength="200"
                               style="width:150px" placeholder="Meeting Number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="meeting_pwd" id="meeting_pwd" value="{{$data->passcode}}" style="width:150px"
                               maxLength="32" placeholder="Meeting Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="meeting_email" id="meeting_email" value="" style="width:150px"
                               maxLength="32" placeholder="Email option" class="form-control">
                    </div>

                    <input type="hidden" id="meeting_role" class="sdk-select" value="1" />
                    <input type="hidden" id="meeting_china" class="sdk-select" value="0" />
                    <input type="hidden" id="meeting_lang" class="sdk-select" value="en-US" />

                    <input type="hidden" value="{{$data->join_url}}" id="copy_link_value" />
                    <button type="submit" class="btn btn-primary" id="join_meeting">{{trans('s_admin.join')}}</button>
                    <button type="button" link="" onclick="window.copyJoinLink('#copy_join_link')"
                            class="btn btn-primary" id="copy_join_link">{{trans('s_admin.copy_link')}}</button>
                </form>

                <iframe style="width: 100%;height: 750px;border: none;" id="zoom_iframe" src="" ></iframe>
            </div>
        </div>
    </nav>

    <script src="https://source.zoom.us/1.9.1/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/1.9.1/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/1.9.1/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/1.9.1/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/1.9.1/lib/vendor/lodash.min.js"></script>
    <script src="https://source.zoom.us/zoom-meeting-1.9.1.min.js"></script>
    <script src="{{ asset('zoom/js/tool.js') }}"></script>
    <script src="{{ asset('zoom/js/vconsole.min.js') }}"></script>
    <script src="{{ asset('zoom/js/index.js') }}"></script>

    <script>

    </script>
</body>

</html>
