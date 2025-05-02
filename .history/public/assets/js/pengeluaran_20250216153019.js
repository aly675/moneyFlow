document.getElementById("dropdownBtn").addEventListener("click", function () {
    let menu = document.getElementById("dropdownMenu");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
});

document.addEventListener("click", function (event) {
    let dropdown = document.querySelector(".dropdown");
    if (!dropdown.contains(event.target)) {
        document.getElementById("dropdownMenu").style.display = "none";
    }
});

function toggleDropdown() {
    const dropdownContent = document.getElementById('paymentOptions');
    dropdownContent.classList.toggle('active');
  }

  const paymentOptions = document.querySelectorAll('.payment-option');
  paymentOptions.forEach(option => {
    option.addEventListener('click', function() {
      paymentOptions.forEach(opt => opt.classList.remove('selected'));
      this.classList.add('selected');
      document.querySelector('.dropdown-header').firstChild.textContent = this.textContent;
      document.getElementById('paymentOptions').classList.remove('active');
    });
  });

  function selectCategory(category) {
    const notesInput = document.getElementById('notes');
    notesInput.value = category;

    const buttons = document.querySelectorAll('.category-btn');
    buttons.forEach(btn => {
      if (btn.textContent === category) {
        btn.classList.add('selected');
      } else {
        btn.classList.remove('selected');
      }
    });
  }
