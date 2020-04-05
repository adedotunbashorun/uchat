@if($blocks = Blocks::allIn(['messages','events','photo-gallery','donate']))
    <div class="icons-box style-2 flex-row no-gutters item-col-4">

        <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->
        @foreach($blocks as $block)
            <div class="icons-wrap">

                <div class="bg-img" data-bg="{{ $block->present()->thumbSrc(480,336) }}"></div>
                <div class="icons-item">
                    <div class="item-box">
                        <h3 class="icons-box-title"><a href="#">{!! $block->title !!}</a></h3>
                        <p>{!! strip_tags($block->content) !!}</p>
                        <div class="hidden-area">
                            <a href="{{url($block->link)}}" class="btn btn-style-3">{{$block->link_label}}</a>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endif