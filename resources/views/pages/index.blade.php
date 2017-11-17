@extends('master')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <form method="post"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="col-xs-12 col-md-6">
                        <div class="formBox borderDefault">
                            <h2 class="text-center">Choose Image</h2>
                            <div class="setting image_picker">
                                <div class="settings_wrap">
                                    <label class="drop_target">
                                        <div class="image_preview"></div>
                                        <input id="inputFile" type="file" name="bgImage" accept="image/*" />
                                    </label>
                                    <div class="settings_actions vertical">
                                        <a data-action="choose_from_uploaded">
                                            <i class="fa fa-picture-o"></i>
                                            Choose from Uploads
                                        </a>
                                        <a class="disabled" data-action="remove_current_image">
                                            <i class="fa fa-ban"></i>
                                            Remove Current Image
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 watermark_image">
                        <div class="formBox borderblue">
                            <h2 class="text-center">Choose Watermark</h2>
                            <div class="setting image_picker image_picker1 watermark_image">
                                <div class="settings_wrap">
                                    <label class="drop_target">
                                        <div class="image_preview1"></div>
                                        <input id="inputWaterMark" type="file" name="wmImage" accept="image/*" />
                                    </label>

                                    <div class="settings_actions vertical">
                                        <a data-action="choose_from_uploaded">
                                            <i class="fa fa-picture-o"></i>
                                            Choose from Uploads
                                        </a>
                                        <a class="disabled" data-action="remove_current_image1">
                                            <i class="fa fa-ban"></i>
                                            Remove Current Image
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-md-6 watermarkText">
                        <div class="formBox borderRed">
                            <h2 class="text-center">Choose Watermark Text</h2>
                            <div class="watermark_text">
                                <div class="form-group">
                                    <input type="text" name="wmText" id="watermarkText" class="form-control" placeholder="Watermark Text"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 ">
                        <div class="formBox borderCreen">
                            <h2 class="text-center">Set Text</h2>

                            <div class="form-group">
                                <input type="text" name="text" id="setText" class="form-control" placeholder="Text">
                            </div>
                        </div>
                    </div>


                    {{csrf_field()}}
                    <div class="fixed-bottom controlPanel">
                        <div class="position-relative">
                            <div class="col-xs-6 text-center switchContainer">
                                <input id="#switchForm" type="checkbox" name="checkbox" class="js-switch js-check-change" checked />
                            </div>

                            <div class="submitBlock">
                                <input id="switchForm" class="btn btn-custom" type="submit" value="submit"/>
                            </div>

                            <div class="col-xs-6 text-center">
                                <div class="form-group colorPicker">
                                    <label for="setColor">Set Color</label>
                                    <input name="color" type="hidden" id="color_value" value="FFFFFF">
                                    <button id="setColor" class="btn jscolor {valueElement: 'color_value'}"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>
@endsection

@section('specialScripts')
    <script src="{{url('js/jscolor.js')}}"></script>
    <script src="{{url('js/switchery.js')}}"></script>
    <script src="{{url('js/custom.js')}}"></script>



@endsection