<link href="{{url('design/open_course') }}/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="{{url('design/open_course') }}/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<html>
<head>
    <title>Open / Edit Course</title>
    <link rel="stylesheet" href="{{url('design/open_course') }}/bootstrap-3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <script src="{{url('design/open_course') }}/js/jquery-3.3.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<style>
    body{
        background-image:url(https://wallpapertag.com/wallpaper/full/c/a/a/157415-simplistic-wallpapers-1920x1080-lockscreen.jpg)
    }
    #login-name{
        font-size: 65px;
        font-family: arabic typesetting;
        border-bottom-style: ridge;
        color:white;

    }
    #login{
        background-color:rgba(13,13,13,0.2);
        min-height:450px;
        padding: 40px 80px 40px 90px;
        box-shadow: -10px -10px 9px #33cc33;

    }
    .user{
        font-size: 29px;

        font-family: arabic typesetting;

        color: white;

    }

    #iconn{

        background-color: #5cb85c;
        border-color: #4cae4c;
        color: white;

    }
    #iconn1{

        background-color: #5cb85c;
        border-color: #4cae4c;
        color: white;

    }

    #text1{

        border-radius: 0;
        height: 40px;
    }
    #text2{

        border-radius: 0;
        height: 40px;
    }

    .btn{
        width: 50%;
        float: left;
        height: 40px;
        font-size: 18px;
    }

    .label_001{

        font-size: 18px;
        color: white;
        font-style: italic;
    }
</style>
<script>
    $( document ).on( 'click', '.btn-add', function ( event ) {
        event.preventDefault();

        var field = $(this).closest( '.form-group' );
        var field_new = field.clone();

        $(this)
            .toggleClass( 'btn-default' )
            .toggleClass( 'btn-add' )
            .toggleClass( 'btn-danger' )
            .toggleClass( 'btn-remove' )
            .html( '–' );

        field_new.find( 'input' ).val( '' );
        field_new.insertAfter( field );
    } );

    $( document ).on( 'click', '.btn-remove', function ( event ) {
        event.preventDefault();
        $(this).closest( '.form-group' ).remove();
    } );
</script>
<body>
<div class="container">
    <br/>
    <br/>
    <br/>
    <br/>

    <center> <b id="login-name">New Course </b> </center>
    <div class="row">
        <div class="col-md-6 col-md-offset-3" id="login">

            {!! Form::open(['route'=>['course.update',$course->id],'method'=>'put']) !!}

                <div class="form-group">
                    {!! Form::label('semester_id','Semester',['class'=>'user']) !!}
                    <select class="form-control" name="semester_id" style="height: 50px;">
                        <option value="">Select Semester</option>
                        @foreach($all_semesters as $all_semester)
                            <option value="{{$all_semester->id}}" >{{$all_semester->title}}</option>
                        @endforeach
                    </select>
                </div>

                {!! Form::label('faculty_course_id','Faculty Course',['class'=>'user']) !!}
                <div class="form-group input-group">
                    <select class="form-control" name="faculty_course_id" style="height: 50px;">
                        <option value="">Select Faculty Course</option>
                    @foreach($all_faculty_courses as $faculty_cours)
                            <option value="{{$faculty_cours->id}}" >{{$faculty_cours->title}}</option>
                        @endforeach
                    </select>
                    <span class="input-group-btn"><button type="button" class="btn btn-default btn-add" style="width: 40px; height: 50px;">+</button></span>
                </div>
            <div class="form-group">
                {!! Form::label('no_of_lectures','Number Of Lectures',['class'=>'user']) !!}
                <input type="number" name="no_of_lectures" class="form-control">
            </div>
            <div class="form-group">
                {!! Form::label('no_of_doctors','Number Of Doctor',['class'=>'user']) !!}
                <input type="number" name="no_of_doctors" class="form-control">
            </div>
                <br>

                <div class="form-group">

                    <input type="submit" class="btn btn-success" value="Save" style="border-radius:0px;">
                    <input type="reset" class="btn btn-danger" value="Reset" style="border-radius:0px;">

                </div>


            {!! Form::close() !!}
        </div>
    </div>
</div>
</body>
</html>