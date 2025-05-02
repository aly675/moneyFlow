document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('expenseChart');
    if (!canvas) {
        console.error('Canvas tidak ditemukan');
        return;
    }

    const ctx = canvas.getContext('2d');

    try {
        const expenseChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Sisa Saldo', 'Jajan'],
                datasets: [{
                    data: [85, 15],
                    backgroundColor: [
                        '#4caf50',
                        '#f44336'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                cutout: '70%'
            }
        });

        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => {
                document.querySelector('.tab.active').classList.remove('active');
                tab.classList.add('active');
            });
        });
    } catch (error) {
        console.error('Error membuat chart:', error);
    }
});
