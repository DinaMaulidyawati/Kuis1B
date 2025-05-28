let ctx = document.getElementById('chartCanvas').getContext('2d');
let chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Data Bulanan',
            data: data,
            borderColor: 'blue',
            fill: false,
            tension: 0.1
        }]
    },
    options: {
        responsive: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

function addData() {
    let label = document.getElementById('labelInput').value.trim();
    let value = document.getElementById('valueInput').value;

    if (label === '' || value === '') {
        alert('Label dan Value tidak boleh kosong!');
        return;
    }

    labels.push(label);
    data.push(parseInt(value));
    chart.update();

    document.getElementById('labelInput').value = '';
    document.getElementById('valueInput').value = '';
}
