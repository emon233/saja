<div class="modal" id="comments-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="{{ route('papers.reviewed', $paper->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Write Your Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" name="comments" placeholder="Comments" rows="5"></textarea>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-warning float-right" onclick="return confirm('Are you sure?')" value="MARK AS REVIEWED">
                </div>
            </form>
        </div>
    </div>
</div>