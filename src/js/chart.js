
const labels = ["January", "February", "March", "April", "May", "June"];
const data = {
    labels: labels,
    datasets: [
        {
        label: "Assets Management System",
        backgroundColor: "blue",
        borderColor: 'rgb(75, 192, 192)',
        data: [0, 10, 5, 2, 20, 30, 45],
        fill: false,
        },
    ],
};

const configLineChart = {
    type: "line",
    data,
    options: {},
};

var chartLine = new Chart(
    document.getElementById("chart-line"),
    configLineChart
);

