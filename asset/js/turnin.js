const success = (score) => {
	document.querySelector('#modal-here').innerHTML = `
		<div class="modal" id="success" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4>Result</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Congrats! You've done this quiz</p>
						<p>Quiz ID: !</p>
					</div>
					<div class="modal-footer">
						<a href="?action=home"><button type="button" class="btn btn-primary">OK</button></a>
					</div>
				</div>
			</div>
		</div>
	`;
	$('#success').modal('show');
}