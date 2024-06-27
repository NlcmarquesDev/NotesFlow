<div class="modal fade text-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Note</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/notes_app_php/notes" method="POST">
                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <input type="text" name="title" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="message" placeholder="Leave a message here" rows="14" cols="30" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Message</label>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="form-check  ">
                            <input class="form-check-input" type="checkbox" name="priority" value="1" id="flexCheckDefault">
                            <label class="form-check-label me-0" for="flexCheckDefault">
                                Priority
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Note</button>
                </div>
            </form>
        </div>
    </div>
</div>