@extends('app')
@section('content')
<h1 class="text-center">Додати вакансії на проект</h1>
<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::model($project, array('route' => array('project.store'), 'enctype' => 'multipart/form-data')) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Назва проекту') !!}
                    {!! Form::text('name', $project->name, ['class' => 'form-control']) !!}
                    {!! $errors->first('name','<span class="help-block">:message</span>') !!}

                    {!! Form::label('logo', 'Логотип') !!}
                    {!! Form::file('logo') !!}
                    {!! $errors->first('logo','<span class="help-block">:message</span>') !!}

                    {!! Form::label('industry_id', 'Галузь') !!}
                    {!! Form::select('industry_id', $industries, null, ['class' => 'form-control']) !!}

                    {!! Form::label('desc_company', 'Опис компанії') !!}
                    {!! Form::text('desc_company', $project->description['desc_company'], ['class' => 'form-control']) !!}
                    {!! $errors->first('desc_company','<span class="help-block">:message</span>') !!}

                    {!! Form::label('about_company', 'Про компанію') !!}
                    {!! Form::textarea('about_company', $project->description['about_company'], ['class' => 'form-control']) !!}
                    {!! $errors->first('about_company','<span class="help-block">:message</span>') !!}

                    {!! Form::label('about_project', 'Про проект') !!}
                    {!! Form::textarea('about_project', $project->description['about_project'], ['class' => 'form-control']) !!}
                    {!! $errors->first('about_project','<span class="help-block">:message</span>') !!}

                    {!! Form::label('term_project', 'Срок проекту') !!}
                    {!! Form::text('term_project', $project->description['term_project'], ['class' => 'form-control']) !!}
                    {!! $errors->first('term_project','<span class="help-block">:message</span>') !!}

                    {!! Form::label('brand', 'Бренд') !!}
                    {!! Form::text('brand', $project->brand, ['class' => 'form-control']) !!}
                    {!! $errors->first('brand','<span class="help-block">:message</span>') !!}

                    {!! Form::label('location', 'Місце знаходження') !!}
                    {!! Form::text('location', $project->location, ['class' => 'form-control']) !!}
                    {!! $errors->first('location','<span class="help-block">:message</span>') !!}

                    {!! Form::label('bonus', 'Бонуси') !!}
                    {!! Form::text('bonus', $project->bonus, ['class' => 'form-control']) !!}
                    {!! $errors->first('bonuses','<span class="help-block">:message</span>') !!}

                    {!! Form::label('breaf_desc', 'Короткий опис') !!}
                    {!! Form::textarea('breaf_desc', $project->description['breaf_desc'], ['class' => 'form-control']) !!}
                    {!! $errors->first('breaf_desc','<span class="help-block">:message</span>') !!}

                    {!! Form::label('full_desc', 'Повний опис') !!}
                    {!! Form::textarea('full_desc', $project->description['full_desc'], ['class' => 'form-control']) !!}
                    {!! $errors->first('full_desc','<span class="help-block">:message</span>') !!}

                 </div>

                {!! Form::submit('Надіслати', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
