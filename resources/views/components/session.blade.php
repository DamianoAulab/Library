@if (session('success')) 
    <div id="sessionSuccess" class="justify-content-center" style="display: flex;">
        <div class="text-center bg-success bg-opacity-25 border border-4 border-success rounded text-success mb-4 px-3 py-2 fs-4 fw-bold">{{session('success')}}</div> 
    </div>
@elseif (session('edit'))
    <div id="sessionEdit" class="justify-content-center" style="display: flex;">
        <div class="text-center bg-warning bg-opacity-25 border border-4 border-warning rounded text-warning mb-4 px-3 py-2 fs-4 fw-bold">{{session('edit')}}</div> 
    </div>
@elseif (session('delete'))
    <div id="sessionDelete" class="justify-content-center" style="display: flex;">
        <div class="text-center bg-danger bg-opacity-25 border border-4 border-danger rounded text-danger mb-4 px-3 py-2 fs-4 fw-bold">{{session('delete')}}</div> 
    </div>
@endif