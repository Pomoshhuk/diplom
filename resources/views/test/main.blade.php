@extends('layouts.app')

@section('title') Создание тестов @stop

@section('content')

<div class="main">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-4 col-md-4 xs-comeout">
                
                {{-- <div class="sidebar">
                    <h3>Список моих тестов</h3>
                    <div class="sidebar-list">
                        @if (isset($tests))
                            @foreach ($tests as $test)
                            <div class="sidebar-list__item"> 

                                <h4> {{$test['name']}}</h4>
                                <a href="test/{{ $test->id }}" class="btn-sm btn-primary">Подробнее</a>
                                <a href="test/{{ $test->id }}/edit" class="btn-sm btn-primary" @click.prevent="switchMainView('test-form',{ id: {{ $test->id }}, title: 'Изменение теста', button: 'Изменить тест' })">Редактировать</a>
                                @if (!empty($test->questions))
                                    @include('test._questions')   
                                @endif  
                            </div>
                            @endforeach
                        @endif     
                    </div>
                    <a href="#" class="btn btn-success">Показать еще</a>
                    <a @click="switchMainView('test-form',{})" class="btn btn-success">Создать тест</a>
                </div> --}}
                
                <test-sidebar ref="testSidebar" id_user="{{Auth::id()}}">
                    
                </test-sidebar>
                
            </div>
            <div class="col-lg-8 col-md-8 js-main-content">

                <div class="main-container">
                    {{-- @yield('contentTest') --}}
                    <popup v-show="showPopup" @close="closePopup">
                        <h3 class="modal-header-text" v-if="popup.header" slot="header">@{{popup.header}}</h3>
                        <p v-if="popup.body" slot="body">@{{popup.body}}</p>
                    </popup>
                    <transition name="fade">
                        <button сlass="main__back btn btn-sm btn-primary"
                                style="
                                    margin-bottom: 15px;
                                "
                                v-show="previous.length"
                        @click="switchPrevious()">Назад</button>
                    </transition>
                    <transition name="fade" mode="out-in">
                        <component v-bind:is="current.mainView" :ref="current.mainView" :array="current.array" v-if="showed">
                        </component>
                    </transition>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts') <script src="{{ URL::asset('js/app.js') }}"></script> @stop