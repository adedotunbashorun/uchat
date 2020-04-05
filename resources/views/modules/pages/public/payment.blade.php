@extends('pages::public.master')
@section('page')
    @include('pages::public._page-banner-section')
    <section class="about-us section register">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-7 col-sm-12">
                    @include('core::public._partials.notify')

                        <div class="auth-form">
                            {!! form_start($register_form,['class'=>'ajax-form','data-redirect'=>url('/login')]) !!}
                            
                            {!! form_end($register_form,false) !!}
                        </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('js')
<script>
    $(document).ready(function() {
        var noSuggestionNoticeMsg = "No results found, inputted text would be added as a base record.";
        // autoCompleteInputLookup($("input[name=interests]"), $('input[name=interest_id]'), "{{route('ajax.interests.search')}}", true, noSuggestionNoticeMsg);
        multipleSelect($("#interests"),"{{route('ajax.interests.search')}}", "select interests", true);
    });
</script>
@endsection