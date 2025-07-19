@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection


@section('content')

    <!-- バリデーション -->
    
    <div class="todo__alert-with">
        @if(session('message'))
        <div class="todo__alert--success">
            {{ session('message') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="todo__alert--danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="content">

        <div class="form__top__wrapper">
            <div class="todo__create__ttl">
                <p class="todo__create__ttl-p">
                    新規作成
                </p>
            </div>
            <form class="form__top" action="/todos" method="post">
                @csrf
                <div class="form__input">
                    <input class="form__input__box" type="text" name="content" value="{{ old('content') }}">
                </div>
                <div class="form__category">
                    <select class="form__category__box" name="category_id">
                        @foreach ($categories as $category)
                        <!--
                        <option value="category1">category1</option>
                        <option value="category2">category2</option> -->
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__button">
                    <button class="form__button__submit" type="submit">
                        作成
                    </button>
                </div>
            </form>
            <div class="todo__list__ttl">
                <p class="todo__list__ttl-p">
                    Todo検索
                </p>
            </div>
            <form class="form__top" action="/todos/search" method="get">
                @csrf
                <div class="form__input">
                    <input class="form__input__box" type="text" name="keyword" value="{{ old('keyword') }}">
                </div>
                <div class="form__category">
                    <select class="form__category__box" name="category_id">
                        @foreach ($categories as $category)
                        <!--
                        <option value="category1">category1</option>
                        <option value="category2">category2</option> -->
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__button">
                    <button class="form__button__submit" type="submit">
                        検索
                    </button>
                </div>
            </form>
        </div>

        <div class="todo__list__table__wrapper">
            <table class="todo__list__table">
                <tr>
                    <th>
                        <div class="ttl">
                            <p class="todo__ttl-1">
                                Todo
                            </p>
                            <p class="todo__ttl-2">
                            カテゴリ
                            </p>
                        </div>
                    </th>
                </tr>

                @foreach ($todos as $todo)
                <tr>
                    <th>
                        <form action="/todos/update" class="todo__list__update" method="post">
                            @method('PATCH')
                            @csrf
                            <!-- Todoの内容を表示 -->
                            <input class="todo__input__form" type="text" name="content" value="{{ $todo['content'] }}">
                            <input class="todo__input__form" type="hidden" name="id" value="{{ $todo['id'] }}">
                            <div class="update-form__item">
                                <p class="update-form__item-p">{{ $todo['category']['name'] }}</p>
                            </div>
                            <button class="todo__update__button" type="submit">
                                更新
                            </button>
                        </form>
                    </th>
                    <th class="th__delete">
                        <form action="/todos/delete" class="form__list__delete" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="category_id" value="{{ $category['id'] }}">
                            <button class="todo__delete__button" type="submit">
                                削除
                            </button>
                        </form>
                    </th>
                </tr>
                @endforeach
                <!-- <tr>
                    <th>
                        <form action="/todos/update" class="todo__list__update" method="POST">
                            <input class="todo__input__form" type="text" name="content" value="">
                            <input class="todo__input__form" type="text" name="content" value="">
                            <input type="hidden" name="id" value="">
                            <button class="todo__update__button" type="submit">
                                更新
                            </button>
                        </form>
                    </th>
                    <th>
                        <form action="/todos/delete" class="form__list__delete" method="POST">
                            <input type="hidden" name="id" value="">
                            <button class="todo__delete__button" type="submit">
                                削除
                            </button>
                        </form>
                    </th>
                </tr> -->
            </table>
        </div>

        <!-- <div class="todo__list__table__wrapper">
            <table class="todo__list__table">
                @foreach ($todos as $todo)
                <tr>
                    <th>
                        <form action="/todos/update" class="todo__list__update" method="POST">
                            @method('PATCH')
                            @csrf
                            <input class="todo__input__form" type="text" name="content" value="{{ $todo['content'] }}">
                            <input type="hidden" name="id" value="{{ $todo['id'] }}">
                            <button class="todo__update__button" type="submit">
                                更新
                            </button>
                        </form>
                    </th>
                    <th>
                        <form action="/todos/delete" class="form__list__delete" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id" value="{{ $todo['id'] }}">
                            <button class="todo__delete__button" type="submit">
                                削除
                            </button>
                        </form>
                    </th>
                </tr>
                @endforeach
            </table>
        </div> -->
    </div>
@endsection

