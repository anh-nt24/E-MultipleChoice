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

	const elements = document.querySelectorAll('.quiz-questions');
	elements.forEach((e, i) => {
		e.setAttribute('data-idx', i+1);
		document.querySelector('#num-ques').value = i+1;
		const innerInput = e.querySelectorAll('.options input');
		innerInput.forEach(inp => {
			inp.setAttribute('name', `question-option${i+1}[]`);
		})
	});

	const inputState = document.querySelectorAll('.inputState');
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
				inpCorrect.placeholder = "ex: 1";
				document.querySelector('.addOption').parentElement.style.display = 'block';
				document.querySelector('.correct-answer').parentElement.style.display = 'block';
			}
			else if (value == 2) {
				element.innerHTML = checkboxesChoice(1);
				wrapper.appendChild(element);
				option.innerHTML += wrapper.innerHTML;
				inpCorrect.placeholder = "ex: 1, 2 or all";
				inpCorrect.style.width = "120px";
				document.querySelector('.addOption').parentElement.style.display = 'block';
				document.querySelector('.correct-answer').parentElement.style.display = 'block';
			}
			else if (value == 3) {
				element.innerHTML = textChoice();
				wrapper.appendChild(element);
				option.innerHTML += wrapper.innerHTML;
				document.querySelector('.addOption').parentElement.style.display = 'none';
				document.querySelector('.correct-answer').parentElement.style.display = 'none';
			}
		});
	});
}, 500);

function multichoiceOption(idx, dataIdx) {
	return  `
		<div class="col-sm-10 col-9">
			<div class="options">
				<div class="form-group d-flex align-items-center">
					<i class="fa fa-circle-thin pr-3"></i>
					<input type="text" class="form-control" name="question-option${dataIdx}[]" placeholder="Option ${idx}">
				</div>
			</div>
		</div>
		<div class="col-sm-2 col-3 d-flex align-items-center">
			<button type="button" class="btn w-100 question__image-import"><i class="fa fa-image"></i></button>
			<button type="button" onclick="removeOption(this)" class="btn"><i class="fa fa-close"></i></button>
		</div>
`;
}

function checkboxesChoice(idx, dataIdx) {
	return `
		<div class="col-sm-10 col-9">
			<div class="options">
				<div class="form-group d-flex align-items-center">
					<i class="fa fa-square-o pr-3"></i>
					<input type="text" class="form-control" name="question-option${dataIdx}[]" placeholder="Option ${idx}">
				</div>
			</div>
		</div>
		<div class="col-sm-2 col-3 d-flex align-items-center">
			<button type="button" class="btn w-100 question__image-import"><i class="fa fa-image"></i></button>
			<button type="button" onclick="removeOption(this)" class="btn"><i class="fa fa-close"></i></button>
		</div>
	`;
}

function textChoice() {
	return `
		<div class="col-sm-10 col-9">
			<div class="options">
				<div class="form-group d-flex align-items-center">
					<i class="fa fa-pencil-square-o pr-3"></i>
					<input type="text" class="form-control" name="question-option">
				</div>
			</div>
		</div>
		<div class="col-sm-2 col-3 d-flex align-items-center">
			<button type="button" class="btn w-100 question__image-import"><i class="fa fa-image"></i></button>
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
					<input type="text" class="form-control" name="ques-title[]" id="ques-title" placeholder="Untitled question">
				</div>
			</div>
			<div class="col-md-1 col-sm-2 col-3">
				<button type="button" class="btn w-100 question__image-import"><i class="fa fa-image"></i></button>
			</div>
			<div class="col-md-3 col-sm-12 col-9 question__type-selection">
				<select name="quiz-type" class="form-control inputState">
					<option value="1" selected> &#9673; Multiple choice</option>
					<option value="2">&#9745; Checkboxes</option>
					<option value="3">&#8230; Text answer</option>
				</select>
			</div>
		</div>
		<div class="row px-2">
			<div class="col-12">
				<div class="quiz-question__options">
					<div class="row option">
						<div class="col-sm-10 col-9">
							<div class="options">
								<div class="form-group d-flex align-items-center">
									<i class="fa fa-circle-thin pr-3"></i>
									<input type="text" class="form-control" name="question-option${+dataIdx+1}[]" placeholder="Option 1">
								</div>
							</div>
						</div>
						<div class="col-sm-2 col-3 d-flex align-items-center">
							<button type="button" class="btn w-100 question__image-import"><i class="fa fa-image"></i></button>
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
						<input name="correct-ans[]" style="width: 50px" type="text" placeholder="ex: 1">
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

