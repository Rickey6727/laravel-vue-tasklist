@extends('app')
@section('content')
    <div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			@include('common.errors')
			<div class="panel panel-default">
				<div class="panel-heading">
					New Task
				</div>
				<div class="panel-body">
					<form action="{{url('task')}}" method="POST" class="form-horizontal">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="task-name" class="col-sm-3 control-label">Task Name</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="task-name" class="form-control">
						</div>
						<div class="col-sm-3">
							<button type="submit" class="btn btn-default">
								<i class="fa fa-btn fa-plus"></i> Add Task
							</button>
						</div>
					</div>
					</form>
				</div>
			</div>
			@if (count($tasks) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
					Current Tasks
					</div>
					
					<div>
						<table class="table table-striped">
							<tbody>
								@foreach($tasks as $task)
									<tr>
										<form action="{{ url('task/edit/'.$task->id) }}" method="POST">
											{{csrf_field()}}
											<input class="form-control" type="hidden" name="id" value="{{$task->id}}">
											<td>
												<div class="form-group">
													<label for="task-name" class="col-sm-2 control-label">No.{{$task->id}}</label>
													<div class="col-sm-10">
													<input type="text" name="name" id="task-name" class="form-control" value="{{$task->name}}">
													</div>
												</div>
											</td>
											<td>
												<button type="submit" class="btn btn-success">
													Edit
												</button>
											</td>
										</form>
										<form action="{{ url('task/'.$task->id) }}" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<td>
												<button type="submit" class="btn btn-danger">
													Delete
												</button>
											</td>
										</form>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
    </div>
@endsection
