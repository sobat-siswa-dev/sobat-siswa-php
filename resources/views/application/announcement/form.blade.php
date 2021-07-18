@extends('layout.application')
@section('title', 'Pengumuman')
@section('menu-parent', 'learning')
@section('content')
    <div class="content">
        <div class="container-xl">
            <div class="page-header text-white d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Informasi dan KBM
                        </div>
                        <h2 class="page-title">
                            Form Pengumuman
                        </h2>
                    </div>
                </div>
            </div>
            <form method="POST" enctype="multipart/form-data" action="">
                {{ csrf_field() }}
                @if ($kbmAnnouncement->id)
                    <input type="hidden" name="id" value="{{ $kbmAnnouncement->id }}" />
                @endif
                <div class="row row-deck row-cards">
                    <div class="col-12 d-block">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Judul <sup class="font-bold text-red">*</sup>
                                    </label>
                                    <input name="title" required="" value="{{ $kbmAnnouncement->title }}" type="text" maxlength="100" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Isi <sup class="font-bold text-red">*</sup>
                                    </label>
                                    <textarea name="description" class="editor">{{ $kbmAnnouncement->description }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        {{ $kbmAnnouncement->attch ? "Ganti" : "" }} Lampiran
                                    </label>
                                    <div class="form-control">
                                        <input type="file" name="attch">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <a href="">
                            <button type="button" class="btn btn-md btn-secondary mr-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" /></svg> Kembali
                            </button>  
                        </a>
                    </div>
                    <div class="col-6">
                        <button name="submit-save" class="btn btn-md btn-primary ml-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg> Simpan
                        </button>  
                    </div>
                </div>
            </form>
        </div>
        @include("assets.copyright")
    </div>
    <script>
        $(document).ready(function () {
            ClassicEditor.create( document.querySelector( '.editor' ), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'outdent',
                    'indent',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    'undo',
                    'redo'
                ]
            },
            language: 'id',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
                licenseKey: '',
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( error => {
                console.error( 'Oops, something went wrong!' );
                console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                console.warn( 'Build id: 9v05xvm1pkry-jfha1cexgplv' );
                console.error( error );
            } );
        })
    </script>
@stop