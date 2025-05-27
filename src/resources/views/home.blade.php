@extends('layouts.app')
@section('content')

    <section class="new-link">
        <div class="my-5 row">

            <form method="POST" action="{{ route('home.store') }}" class="col-lg-6">
                @csrf
                <div class="p-6">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="link" class="form-label">Введите ссылку</label>
                        <div class="input-group">

                            <input type="text" name="link" class="form-control" id="link"
                                   placeholder="Ссылка вида https://longlink.com/need-short-link"
                                   :value="old('link')" required>
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </section>

    <section class="link-list">
        <table class="table">
            @foreach($links as $link)
                <tr class="border">
                    <td>
                        <a href="{{ $link->link }}"> {{ $link->link }}</a>
                    </td>
                    <td>
                        <a href="{{ route('links.goaway', $link->token )}}"
                           target="_blank"> {{ route('links.goaway', $link->token )}}</a>
                    </td>
                    <td>
                        {{ $link->ip }}
                    </td>
                    <td>
                        <small>{{ $link->user_agent }}</small>
                    </td>
                    <td>
                        {{ $link->count }}
                    </td>
                    <td>
                        {{ $link->created_at->format('d.m.Y H:i') }}
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="box-footer">
            <div class="flex items-center flex-wrap overflow-auto">
                {{ $links->links() }}
            </div>
        </div>
    </section>

@endsection
