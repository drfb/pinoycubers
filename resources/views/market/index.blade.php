@extends('layouts.master')

@section('title')
@parent
| Market
@stop

@section('content')

<!-- Menu -->
<div class="row">
    <div class="col-md-10" style="margin: 0; padding: 0;">
        <h3>Market</h3>
    </div>
    <div class="col-md-2 text-right" style="margin-top: 18px; padding: 0">
        {!! Html::link('market/add', 'Add an item', ['class' => 'btn btn-sm btn-default']) !!}
    </div>
</div>

@include('partials.messages')

<!-- Nav -->

<div class="row">
    <div class="col-sm-6" style="border-bottom: 1px solid #ecf0f1;">
        <h4>Items for Sale</h4>
    </div>
    <div class="col-sm-6" style="padding-left: 0">
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#">newest</a></li>
            <li role="presentation"><a href="#">price</a></li>
            <li role="presentation"><a href="#">condition</a></li>
        </ul>
    </div>
</div>

<!-- Market Items -->

<hr>

@foreach ($items as $item)
<div class="row">
    <div class="col-sm-7">
        <ul class="list-unstyled">
            <li><b>{!! Html::link('market/item/'.$item->slug, $item->title) !!}</b></li>
            <li><b>PHP {!! $item->price !!}</b></li>

            @if ($item->shipping && $item->meetups)
                <li><b>Delivery through shipping and meet-ups are available</b></li>
            @elseif ($item->shipping)
                <li><b>Delivery through shipping only</b></li>
            @elseif ($item->meetups)
                <li><b>Delivery through meet-ups only</b></li>
            @endif

            <li>
                <b>{{ $item->comments->count() }}</b> <span class="glyphicon glyphicon-comment"></span> 
                <b>{{ count(unserialize($item->viewers)) }}</b> <span class="glyphicon glyphicon-eye-open"></span>
            </li>
        </ul>
    </div>
    <div class="col-sm-5">
        <ul class="list-unstyled">
            <li>-creation/modification time-</li>
            <li><span class="glyphicon glyphicon-user"></span> <b>{{ $item->user->first_name }} {{ $item->user->last_name }}</b></li>
        </ul>
    </div>
</div>
<hr>
@endforeach

{!! $items->render() !!}
   
<!-- /Market Items -->

@stop
