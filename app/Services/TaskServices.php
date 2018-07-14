<?php
namespace App\Services;
use Exception;
use Illuminate\Auth\AuthManager;
use Illuminate\Database\DatabaseManager;
use Illuminate\Events\Dispatcher;
use App\Repositories\TaskInterface;
use Illuminate\Http\Request;
use App\Task;
class TaskServices
{

    private $taskRepository;
    public function __construct(TaskInterface $taskRepository) {

        $this->taskRepository = $taskRepository;
    }

    public function create(Request $request)
    {
        $create=$this->taskRepository->create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'order' => $request->order
        ]);;
        return response()->json([
            'status' => (bool) $create,
            'data'   => $create,
            'message' => $create ? 'Task Created!' : 'Error Creating Task'
        ]);

    }
    public function update(Request $request,Task $task1)
    {
        $this->taskRepository=$task1;
        $status = $this->taskRepository->update($request->only(['name', 'category_id', 'user_id', 'order'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Task Updated!' : 'Error Updating Task'
        ]);

    }

}