@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection


@section('content')

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
            <form class="form__top" action="/categories" method="post">
                @csrf
                <div class="form__input">
                    <input class="form__input__box" type="text" name="name" value="{{ old('name') }}">
                </div>
                <div class="form__button">
                    <button class="form__button__submit" type="submit">
                        作成
                    </button>
                </div>
            </form>
        </div>
        <div class="todo__list__ttl">
            <p>
                category
            </p>
        </div>
        <div class="todo__list__table__wrapper">
            <table class="todo__list__table">
                @foreach ($categories as $category)
                <tr>
                    <th>
                        <form action="/categories/update" class="todo__list__update" method="POST">
                            @method('PATCH')
                            @csrf
                            <!-- カテゴリ名を表示 -->
                            <input class="todo__input__form" type="text" name='name' value="{{ $category['name'] }}">
                            <input type="hidden" name="id" value="{{ $category['id'] }}">
                            <button class="todo__update__button" type="submit">
                                更新
                            </button>
                        </form>
                    </th>
                    <th>
                        <form action="/categories/delete" class="form__list__delete" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id" value="{{ $category['id'] }}">
                            <button class="todo__delete__button" type="submit">
                                削除
                            </button>
                        </form>
                    </th>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!-- <div class="content">
        <div class="form__top__wrapper">
            <form class="form__top" action="/todos" method="post">
                @csrf
                <div class="form__input">
                    <input class="form__input__box" type="text" name="content">
                </div>
                <div class="form__button">
                    <button class="form__button__submit" type="submit">
                        作成
                    </button>
                </div>
            </form>
        </div>
        <div class="todo__list__ttl">
            <p>
                Todo
            </p>
        </div>
        <div class="todo__list__table__wrapper">
            <table class="todo__list__table">
                foreach ($todos as $todo)
                <tr>
                    <th>
                        <form action="/todos/update" class="todo__list__update" method="POST">
                            @method('PATCH')
                            @csrf
                            <input class="todo__input__form" type="text" name="content" value=">
                            <input type="hidden" name="id" value="">
                            <button class="todo__update__button" type="submit">
                                更新
                            </button>
                        </form>
                    </th>
                    <th>
                        <form action="/todos/delete" class="form__list__delete" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id" value="">
                            <button class="todo__delete__button" type="submit">
                                削除
                            </button>
                        </form>
                    </th>
                </tr>
                endforeach
            </table>
        </div>
    </div> -->
@endsection

