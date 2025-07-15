@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
    <div class="content">
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
                <tr>
                    <th>
                        <form action="" class="todo__list__update">
                            <input class="todo__input__form" type="text" name="content" value="test">
                            <button class="todo__update__button" type="submit">
                                更新
                            </button>
                        </form>
                    </th>
                    <th>
                        <form action="" class="form__list__delete">
                            <button class="todo__delete__button" type="submit">
                                削除
                            </button>
                        </form>
                    </th>
                </tr>
                <tr>
                    <th>
                        <form action="" class="todo__list__update">
                            <input class="todo__input__form" type="text" name="content" value="test2">
                            <button class="todo__update__button" type="submit">
                                更新
                            </button>
                        </form>
                    </th>
                    <th>
                        <form action="" class="form__list__delete">
                            <button class="todo__delete__button" type="submit">
                                削除
                            </button>
                        </form>
                    </th>
                </tr>
            </table>
        </div>
    </div>
@endsection

