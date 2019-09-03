<template>
    <div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Task
				</div>
				<div class="panel-body">
					<form class="form-horizontal">
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" v-model="newTaskName" placeholder="タスクを入力">
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-default" v-on:click="addTask">
                                    <i class="fa fa-btn fa-plus"></i> Add Task
                                </button>
                            </div>
                        </div>
					</form>
				</div>
			</div>
            <div class="panel panel-default" v-if="tasks.length > 0">
                <div class="panel-heading">
                    Current Tasks
                </div>
                <div>
                    <table class="table table-striped">
                        <tbody>
                            <tr v-for="(task, index) in tasks" :key="index">
                                <div class="col-sm-9">
                                    <form>
                                        <input class="form-control" type="hidden" name="id">
                                        <td class="col-sm-10">
                                            <div class="form-group">
                                                <label for="task-name" class="col-sm-2 control-label">No.{{task.id}}</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" id="task-name" class="form-control" v-model="task.name">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <button type="submit" class="btn btn-success" v-on:click="editTask(task)">
                                                Edit
                                            </button>
                                        </td>
                                    </form>
                                </div>
                                <div class="col-sm-3">
                                    <form>
                                        <td>
                                            <button type="submit" class="btn btn-danger" v-on:click="deleteTask(task)">
                                                Delete
                                            </button>
                                        </td>
                                    </form>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                newTaskName:'',
                tasks: []
            }
        },
        mounted() {
          axios.get('/task/get').then(response => this.tasks = response.data)
        },
        methods: {
            addTask: function () {
                var article = {
                    'name': this.newTaskName
                };
                axios.post('/task/add', article)
            },
            editTask: function (task) {
                axios.post('/task/edit/' + task.id, task)

            },
            deleteTask: function (task) {
                axios.delete('/task/delete/' + task.id, task)
            }
        }
    }
</script>
