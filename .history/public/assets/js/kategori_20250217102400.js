function toggleDropdown() {
    const dropdownContent = document.getElementById('paymentOptions');
    dropdownContent.classList.toggle('active');
  }

  const paymentOptions = document.querySelectorAll('.payment-option');
  paymentOptions.forEach(option => {
    option.addEventListener('click', function(e) {
      paymentOptions.forEach(opt => opt.classList.remove('selected'));
      this.classList.add('selected');
      const selectedText = this.querySelector('a').textContent;
      document.querySelector('.dropdown-header').textContent = selectedText;
      document.getElementById('paymentOptions').classList.remove('active');
    });
  });
