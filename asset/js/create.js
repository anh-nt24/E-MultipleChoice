document.title = "MultiA - Create New Quiz"
setInterval(() => {
	const boxes = document.querySelectorAll('.quiz-content > div');
	boxes.forEach(box => {
		box.addEventListener('click', (event) => {
			if (event.target.classList.contains('form-control')) {
				for (let b_i=0;b_i<boxes.length; ++b_i) {
					boxes[b_i].classList.remove('float-up');
				}
				box.classList.add('float-up');
			}
		})
	});

	const textarea = document.querySelectorAll(".txt");
	textarea.forEach(element => {
		element.addEventListener("input", function (e) {
			this.style.height = "auto";
			this.style.height = this.scrollHeight + "px";
		});
	})


	const elements = document.querySelectorAll('.quiz-questions');
	elements.forEach((e, i) => {
		e.setAttribute('data-idx', i+1);
		document.querySelector('#num-ques').value = i+1;
		const innerInput = e.querySelectorAll('.options input');
		innerInput.forEach(inp => {
			inp.setAttribute('name', `question-option${i+1}[]`);
		})
	});
	var inputState = document.querySelectorAll('.inputState');
	inputState.forEach((e,i) => {
		e.addEventListener('change', (event) => {
			const value = event.target.value;
			const option = document.querySelectorAll('.quiz-question__options')[i];
			option.innerHTML = "";
			const inpCorrect = document.querySelectorAll('.correct-answer input')[i];
			let element = document.createElement('div');
			element.classList.add('row', 'option');
			let wrapper = document.createElement('div');
			
			if (value == 1) {
				element.innerHTML = multichoiceOption(1);
				wrapper.appendChild(element);
				option.innerHTML += wrapper.innerHTML;
				inpCorrect.placeholder = "1";
				document.querySelectorAll('.addOption')[i].parentElement.style.display = 'block';
				document.querySelectorAll('.correct-answer')[i].parentElement.style.display = 'block';
			}
			else if (value == 2) {
				element.innerHTML = textChoice();
				wrapper.appendChild(element);
				option.innerHTML += wrapper.innerHTML;
				document.querySelectorAll('.addOption')[i].parentElement.parentElement.style.display = 'none';
				document.querySelectorAll('.correct-answer')[i].parentElement.style.display = 'none';
			}
			else {
				element.innerHTML = multichoiceOption(1);
				wrapper.appendChild(element);
				option.innerHTML += wrapper.innerHTML;
				inpCorrect.placeholder = "1";
				document.querySelector('.addOption').parentElement.style.display = 'block';
				document.querySelector('.correct-answer').parentElement.style.display = 'block';
			}
		});
	});
}, 500);


function multichoiceOption(idx, dataIdx) {
	return  `
		<div class="col-11">
			<div class="options">
				<div class="form-group d-flex align-items-center">
					<i class="fa fa-circle-thin pr-3"></i>
					<input type="text" class="form-control" name="question-option${dataIdx}[]" placeholder="Option ${idx}">
				</div>
			</div>
		</div>
		<div class="col-1 d-flex align-items-center">
			<button type="button" onclick="removeOption(this)" class="btn"><i class="fa fa-close"></i></button>
		</div>
`;
}

function checkboxesChoice(idx, dataIdx) {
	return `
		<div class="col-11">
			<div class="options">
				<div class="form-group d-flex align-items-center">
					<i class="fa fa-square-o pr-3"></i>
					<input type="text" class="form-control" name="question-option${dataIdx}[]" placeholder="Option ${idx}">
				</div>
			</div>
		</div>
		<div class="col-1 d-flex align-items-center">
			<button type="button" onclick="removeOption(this)" class="btn"><i class="fa fa-close"></i></button>
		</div>
	`;
}

function textChoice() {
	return `
		<div class="col-12">
			<div class="options">
				<div class="form-group d-flex align-items-center">
					<i class="fa fa-pencil-square-o pr-3"></i>
					<input type="text" class="form-control" readonly>
				</div>
			</div>
		</div>
	`;
}

const addOption = (obj) => {
	const i = obj.parentElement.parentElement.parentElement.parentElement.parentElement.getAttribute('data-idx');
	const e = document.querySelectorAll('.quiz-question__options')[i-1];
	const idx = e.childElementCount+1;
	let option = e.children;
	option = option[option.length-1];
	const value = document.querySelectorAll('.inputState')[i-1].value;
	let element = document.createElement('div');
	element.classList.add('row', 'option');
	if (value == 1) {
		element.innerHTML = multichoiceOption(idx, i);
	}
	else if (value == 2) {
		element.innerHTML = checkboxesChoice(idx, i);
	}
	option.insertAdjacentElement('afterend', element);
}



const addQuestion = (e) => {
	const dataIdx = e.parentElement.parentElement.getAttribute('data-idx');
	const idx = dataIdx - 1;
	const question = document.querySelectorAll('.quiz-questions')[idx];
	let element = document.createElement('div');
	element.classList.add('quiz-questions');
	element.innerHTML = `
		<button type="button" class="btn removeQuestion" onclick="removeQuestion(this)"><i class="fa fa-close"></i></button>
		<div class="row d-flex align-items-center">
			<div class="col-md-8 col-sm-10 col-12 question__title">
				<div class="form-group">
					<textarea type="text" class="form-control txt" name="ques-title[]" id="ques-title" placeholder="Untitled question"></textarea>
				</div>
			</div>
			<div class="col-md-1 col-sm-2 col-3">
				<div class="form-group">
					<input type="number" step="0.01" class="form-control scores" name="scores[]" placeholder="Score">
				</div>
			</div>
			<div class="col-md-3 col-sm-12 col-9 question__type-selection">
				<select name="quiz-type[]" class="form-control inputState">
					<option value="1" selected> &#9673; Multiple choice</option>
				</select>
			</div>
		</div>
		<div class="row px-2">
			<div class="col-12">
				<div class="quiz-question__options">
					<div class="row option">
						<div class="col-11">
							<div class="options">
								<div class="form-group d-flex align-items-center">
									<i class="fa fa-circle-thin pr-3"></i>
									<input type="text" class="form-control" name="question-option${+dataIdx+1}[]" placeholder="Option 1">
								</div>
							</div>
						</div>
						<div class="col-1 d-flex align-items-center">
							<button type="button" onclick="removeOption(this)" class="btn"><i class="fa fa-close"></i></button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 m-auto text-center">
						<button type="button" class="addOption" onclick="addOption(this)">Add option</button>
					</div>
				</div>
				<div class="row pl-2">
					<div class="correct-answer d-flex">
						<span class="pr-3">Correct answer <span class="correct-answer__instruction" style="font-size: 9px;">(number only)</span>: </span>
						<input name="correct-ans[]" style="width: 50px" type="number" placeholder="1">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<button type="button" class="d-flex btn addQuestion" onclick="addQuestion(this)">
				<i style="font-size: 22px" class="fa fa-plus-circle"></i>
				<span>Add question</span>
			</button>
		</div>
	`;
	question.insertAdjacentElement('afterend', element);
	element.scrollIntoView();
}

const removeOption = (element) => {
	element.parentElement.parentElement.remove();
	const option = document.querySelector('.quiz-question__options');
	const leftElement = Array.from(option.children);
	leftElement.forEach((e,i) => {
		e.querySelector('input').placeholder = "Option " + (i+1);
	})
}

const removeQuestion = (element) => {
	element.parentElement.remove();
}

const success = (id) => {
	document.querySelector('#modal-here').innerHTML = `
		<div class="modal" id="success" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h4>Your quiz has just been recorded!</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p class='d-flex justify-content-between align-items-center'><span>Quiz ID: <span class='ml-2 py-2 px-3' style="background-color: #f1f2f7; border-radius: 5px" id="quiz-id">#${id}</span></span>
					<button class="btn btn-light" id="copy-id-button" data-clipboard-target="#quiz-id"><i class='fas fa fa-clipboard'></i></button>
					</p>
				</div>
				<div class="modal-footer">
					<a href="index.php?action=home"><button type="button" class="btn btn-primary">Back home</button></a>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Create one another</button>
				</div>
				</div>
			</div>
		</div>
	`;
	
	const copyButton = document.getElementById('copy-id-button');

	copyButton.addEventListener('click', function () {
		const clipboard = new ClipboardJS('#copy-id-button');

		clipboard.on('success', function () {
			// Optional: show a message/modal to the user
			alert('ID copied to clipboard!');
		});
	});
	$('#success').modal('show');
}


