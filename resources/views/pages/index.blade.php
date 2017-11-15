@extends('master')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <h2>Choose Images you need to watermark:</h2>
                <form method="post" action="{{route('upload-image')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="setting"></div>
                    <div class="setting image_picker">
                        <h2>Choose Images you need to watermark:</h2>

                        <div class="settings_wrap">
                            <label class="drop_target">
                                <div class="image_preview"></div>
                                <input id="inputFile" type="file" name="image"/>
                            </label>
                            <div class="settings_actions vertical"><a data-action="choose_from_uploaded"><i
                                            class="fa fa-picture-o"></i> Choose from Uploads</a><a class="disabled"
                                                                                                   data-action="remove_current_image"><i
                                            class="fa fa-ban"></i> Remove Current Image</a></div>
                        </div>
                    </div>
                    <p>Choose watermark type</p>


                    <select name="watermark_type">
                        <option>Image</option>
                        <option>Text</option>
                    </select>

                    <div class="watermark_image">
                        <div class="setting"></div>
                        <div class="setting image_picker1">
                            <h2>Choose Watermark</h2>
                            <div class="settings_wrap">
                                <label class="drop_target">
                                    <div class="image_preview1"></div>
                                    <input id="inputWaterMark" type="file" name="image2"/>
                                </label>
                                <div class="settings_actions vertical"><a class="disabled"
                                                                          data-action="remove_current_image1"><i
                                                class="fa fa-ban"></i> Remove Current Image</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="watermark_text">
                        <div class="form-group">
                            <label for="watermarkText">Watermark Text </label>
                            <input type="text" name="watermarkText" id="watermarkText" class="form-control"
                                   placeholder="Watermark Text"/>
                        </div>
                    </div>

                    {{csrf_field()}}


                    <div class="row">
                        <div class="col-xs-12">

                            <div class="form-group">
                                <label for="setText">Set Text</label>
                                <input type="text" name="text" id="setText" class="form-control" placeholder="Text">
                            </div>

                        </div>

                    </div>


                    <!-- Now setup your input fields -->

                    <div class="fixed-bottom controlPanel">
                        <div class="position-relative">

                            <div class="col-xs-6 text-center switchContainer">

                                <div class="pretty p-switch p-fill">
                                    <input type="checkbox" name="checkbox" id="switchForm" checked/>
                                    <div class="state">
                                        <label>Text/Image</label>
                                    </div>
                                </div>


                            </div>

                            <div class="submitBlock">
                                <input class="btn btn-custom" type="submit" value="submit"/>
                            </div>

                        </div>

                    </div>
                </form>


            </div>
        </div>
    </section>
@endsection