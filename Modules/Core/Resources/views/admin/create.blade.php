@extends('core::admin.master')

@section('title', trans($module . '::global.new'))

@section('page-group-title')
    @Lang($module . '::global.group_name')
@stop


@section('main')
    <div class="kt-portlet kt-portlet--mobile">
        @include('core::admin._porlet-title', ['module' => $module,'type'=>'back','caption'=>'new'])
        <div class="kt-portlet__body form">
            @include($module . '::admin._form')
        </div>
    </div>
@stop
@section('page-js')
<script>
    $(function() {
        $("#country_id").change(function(){
            var country_id = $(this).val();
            $.ajax({
                url: "/admin/regions/country/region/"+country_id,
                type: 'get',
                dataType: 'json',
                success:function(response){
                    console.log(response);
                    $("#region_id").empty();
                    $("#region_id").append("<option value=''>-- Select Region --</option>")
                    response.regions.forEach((element, index) => {
                        $("#region_id").append("<option value='"+element.id+"'>"+element.name+"</option>");
                    });
                }
            });
        });

        $("#region_id").change(function(){
            var region_id = $(this).val();
            
            $.ajax({
                url: "/admin/states/region/state/"+region_id,
                type: 'get',
                dataType: 'json',
                success:function(response){
                    $("#state_id").empty();
                    $("#state_id").append("<option value=''>-- Select State --</option>")
                    response.states.forEach((element, index) => {
                        $("#state_id").append("<option value='"+element.id+"'>"+element.name+"</option>");
                    });
                }
            });
        });

        $("#state_id").change(function(){
            var state_id = $(this).val();
            
            $.ajax({
                url: "/admin/districts/state/district/"+state_id,
                type: 'get',
                dataType: 'json',
                success:function(response){
                    $("#district_id").empty();
                    $("#district_id").append("<option value=''>-- Select District --</option>")
                    response.districts.forEach((element, index) => {
                        $("#district_id").append("<option value='"+element.id+"'>"+element.name+"</option>");
                    });
                }
            });
        });

        $("#district_id").change(function(){
            var district_id = $(this).val();
            
            $.ajax({
                url: "/admin/zones/district/zone/"+district_id,
                type: 'get',
                dataType: 'json',
                success:function(response){
                    $("#zone_id").empty();
                    $("#zone_id").append("<option value=''>-- Select Zone --</option>")
                    response.zones.forEach((element, index) => {
                        $("#zone_id").append("<option value='"+element.id+"'>"+element.name+"</option>");
                    });
                }
            });
        });

        $("#zone_id").change(function(){
            var zone_id = $(this).val();
            
            $.ajax({
                url: "/admin/areas/zone/area/"+zone_id,
                type: 'get',
                dataType: 'json',
                success:function(response){
                    $("#area_id").empty();
                    $("#area_id").append("<option value=''>-- Select Area --</option>")
                    response.areas.forEach((element, index) => {
                        $("#area_id").append("<option value='"+element.id+"'>"+element.name+"</option>");
                    });
                }
            });
        });
    });
</script>
@endsection