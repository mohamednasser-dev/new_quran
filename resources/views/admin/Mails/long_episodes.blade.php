
<div class="flex-row-fluid ml-lg-8 d-block" id="kt_inbox_list">
    <div class="card card-custom card-stretch">
        <div class="card-header row row-marginless align-items-center flex-wrap py-5 h-auto">
           <h4>{{trans('s_admin.nav_long_episode')}}</h4>
        </div>
        <div class="card-body table-responsive px-0">
            <div class="list list-hover min-w-500px" data-inbox="list">
                @foreach($data as $row)
                    <div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
                        <div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
                            <span class="font-weight-bolder font-size-lg mr-2">{{$row->message}}</span>
                        </div>
                        <div class="mt-2 mr-3 font-weight-bolder w-50px text-right" data-toggle="view">{{$row->created_at->format('g:i a')}}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>









