@extends('layouts.app', [
    'activePage' => 'room',
    'title' => 'Room Status',
    'navName' => 'Room Status',
    'activeButton' => 'room'])



@section('content')
    @livewire('room')
@endsection