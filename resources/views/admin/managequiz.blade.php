@extends('admin.layout.master')

@section('title')
    Manage Quiz
@endsection

<style>
    .owl-nav {
        display: none !important;
    }
</style>
@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Quiz</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @include('admin.layout.laravel_errors')
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-10"><h6 class="card-title">Manage Quiz</h6></div>
                            <div class="col-md-2">
                                <button class="btn btn-outline-dark w-100" type="button" data-bs-toggle="modal"
                                        data-bs-target="#AddPartners">Add Questions
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($questions as $t=>$question)
                                    <tr>
                                        <td>{{ $t+1 }}</td>
                                        <td>
                                            @if(isset($question->image) && !empty($question->image))
                                                <a href="{{ URL::asset('admin/assets/uploads/'.$question->image) }}"
                                                   target="_blank">
                                                    <img src="{{ URL::asset('admin/assets/uploads/'.$question->image) }}"
                                                         style="width: 50px;height: 50px;border-radius: 50%">
                                                </a>
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>{{ \Illuminate\Support\Str::limit($question->question, 50) }}</td>
                                        <td>{{ $question->correctanswer->option }}</td>
                                        <td>
                                            <a data-bs-toggle="modal"
                                               data-bs-target="#UpdateCategory{{ $question->id }}"
                                               class="btn btn-outline-info btn-icon">
                                                <i data-feather="edit"></i>
                                            </a>
                                        </td>
                                        <td>

                                            <a onclick="return(confirm('Are you sure to delete this record permanently ?'))"
                                               href="{{ route('admin.deletequestion',[encrypt($question->id)]) }}"
                                               class="btn btn-outline-danger btn-icon">
                                                <i data-feather="trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    {{--  update modal--}}
                                    <div class="modal fade" id="UpdateCategory{{ $question->id }}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Update
                                                        Question</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <form action="{{ route('admin.updatequizquestionoption') }}"
                                                              method="post" class="MyForm"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $question->id }}">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label> Questions </label>
                                                                        <input type="text" name="question"
                                                                               autocomplete="off"
                                                                               class="form-control MyInput"
                                                                               required="" placeholder="Question . . . "
                                                                               value="{{ $question->question }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label> Image </label>
                                                                        <input type="file" name="image"
                                                                               autocomplete="off"
                                                                               class="form-control MyInput"
                                                                               accept="image/*">
                                                                    </div>
                                                                </div>

                                                                @forelse($question->options as $o=>$op)
                                                                    <div class="col-md-10">
                                                                        <div class="form-group">
                                                                            <label> Option {{ $o+1 }} </label>
                                                                            <input type="text" name="option[]"
                                                                                   class="form-control MyInput"
                                                                                   placeholder="Option {{ $o+1 }}" required value="{{ $op->option }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label> Answer </label>
                                                                            <select name="answer[]" class="form-control MyInput" required>
                                                                                <option value="1" @if($op->correct==1) selected @endif>True</option>
                                                                                <option value="0" @if($op->correct==0) selected @endif>False</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                @empty
                                                                @endforelse

                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-dark MyButton"
                                                                            type="submit" id=""> Save
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="AddPartners" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Add Questions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form action="{{ route('admin.savequizquestionoptions') }}" method="post" class="MyForm"
                                  id=""
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Questions </label>
                                            <input type="text" name="question" autocomplete="off"
                                                   class="form-control MyInput"
                                                   required="" placeholder="Question . . . ">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Image </label>
                                            <input type="file" name="image" autocomplete="off"
                                                   class="form-control MyInput" accept="image/*">
                                        </div>
                                    </div>


                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label> Option 1 </label>
                                            <input type="text" name="option[]" class="form-control MyInput"
                                                   placeholder="Option 1" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label> Answer </label>
                                            <select name="answer[]" class="form-control MyInput" required>
                                                <option value="1" selected>True</option>
                                                <option value="0">False</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label> Option 2 </label>
                                            <input type="text" name="option[]" class="form-control MyInput"
                                                   placeholder="Option 2" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label> Answer </label>
                                            <select name="answer[]" class="form-control MyInput" required>
                                                <option value="1">True</option>
                                                <option value="0" selected>False</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label> Option 3 </label>
                                            <input type="text" name="option[]" class="form-control MyInput"
                                                   placeholder="Option 3" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label> Answer </label>
                                            <select name="answer[]" class="form-control MyInput" required>
                                                <option value="1">True</option>
                                                <option value="0" selected>False</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label> Option 4 </label>
                                            <input type="text" name="option[]" class="form-control MyInput"
                                                   placeholder="Option 4" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label> Answer </label>
                                            <select name="answer[]" class="form-control MyInput" required>
                                                <option value="1">True</option>
                                                <option value="0" selected>False</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-dark MyButton" type="submit" id=""> Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('script')



@endsection
