// function : reflect to confirmed display from input value.
function reflectValue(id) {
  const idForm = "form" + id;
  const idConfirm = "confirm" + id;

  switch (id) {
    case "Date":
      {
        const value = document.getElementById(idForm).value;
        let confirm = document.getElementById(idConfirm);
        confirm.innerText = value;
      }
      break;

    case "Time":
    case "NumOfPeople":
      reflectValueOfSelectBox(idForm, idConfirm);
      break;
  }
}

function reflectValueOfSelectBox(idForm, idConfirm)
{
  const value = document.getElementById(idForm).value;
  let confirm = document.getElementById(idConfirm);

  confirm.innerText = value;
}

// reserve form.
{
  // Date : set Default Value.
  {
    let formDate = document.getElementById("formDate");
    const tomorrow = dayjs().add(1, "day").format("YYYY-MM-DD");
    formDate.setAttribute("min", tomorrow);
    formDate.value = tomorrow;
    formDate.setAttribute('value', tomorrow);
    reflectValue('Date');
  }

  // Time : set Option Value.
  {
    const formTime = document.getElementById("formTime");
    const minuteStep = 30;
    let countNum = 0;
    for (let h = 17; h < 24; h++) {
      for (let t = 0; t <= 1; t++) {
        let option = document.createElement("option");
        let time = dayjs()
          .hour(h)
          .minute(t * minuteStep)
          .format("HH:mm");

        option.setAttribute("value", time);
        option.setAttribute("label", time);
        formTime.appendChild(option);
        countNum++;
        if (countNum == 1) {
          option.setAttribute("selected", true);
        }
      }
    }

    reflectValue('Time');
  }

  // Number : set Option Value.
  {
    const formNumOfPeople = document.getElementById("formNumOfPeople");
    for (let n = 1; n <= 30; n++) {
      let option = document.createElement("option");
      option.setAttribute("value", n);
      option.setAttribute("label", n + "人");

      formNumOfPeople.appendChild(option);
      if (n == 1) {
        option.setAttribute("selected", true);
      }
    }

    reflectValue('NumOfPeople');
  }
}
