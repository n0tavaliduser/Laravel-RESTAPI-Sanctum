<div id="delete-modal-{{ $category->id }}" class="modal fade">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content text-center">
      <div class="modal-body">
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <h3>Delete Confirmation</h3>
        <p class="mb-6">Deleting this task category will delete all the task category data from the database.</p>
        <div class="newsletter-wrapper">
          <div class="row">
            <div class="col-md-10 offset-md-1">
              <div id="mc_embed_signup">
                <form method="post" action="{{ route('m_category_task.destroy', $category) }}">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                  <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>