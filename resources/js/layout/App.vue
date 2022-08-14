<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px">
            <span class="text-secondary">Giver Report</span>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <ul></ul>
                </div>
            </div>
        </nav>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Giver Reports</h5>
                <!-- Default Tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="home-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#home"
                            type="button"
                            role="tab"
                            aria-controls="home"
                            aria-selected="true"
                        >
                            Table report
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="profile-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#profile"
                            type="button"
                            role="tab"
                            aria-controls="profile"
                            aria-selected="false"
                        >
                            Chart report
                        </button>
                    </li>
                </ul>
                <div class="tab-content pt-2" id="myTabContent">
                    <div
                        class="tab-pane fade show active"
                        id="home"
                        role="tabpanel"
                        aria-labelledby="home-tab"
                    >
                        <div class="card basic">
                            <div
                                class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns"
                            >
                                <div class="dataTable-top">
                                    <!-- <div class="dataTable-search"><input class="dataTable-input" placeholder="Search..." type="text"></div> -->
                                </div>
                                <div class="dataTable-container">
                                    <table
                                        class="table datatable dataTable-table"
                                    >
                                        <thead>
                                            <tr>
                                                <th
                                                    scope="col"
                                                    data-sortable=""
                                                    style="width: 5.58483%"
                                                >
                                                    <a
                                                        href="#"
                                                        class="dataTable-sorter"
                                                        >First Name</a
                                                    >
                                                </th>
                                                <th
                                                    scope="col"
                                                    data-sortable=""
                                                    style="width: 28.1349%"
                                                >
                                                    <a
                                                        href="#"
                                                        class="dataTable-sorter"
                                                        >Second Name</a
                                                    >
                                                </th>
                                                <th
                                                    scope="col"
                                                    data-sortable=""
                                                    style="width: 37.197%"
                                                >
                                                    <a
                                                        href="#"
                                                        class="dataTable-sorter"
                                                        >Email</a
                                                    >
                                                </th>
                                                <th
                                                    scope="col"
                                                    data-sortable=""
                                                    style="width: 9.58904%"
                                                >
                                                    <a
                                                        href="#"
                                                        class="dataTable-sorter"
                                                        >Gender</a
                                                    >
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="line in data"
                                                :key="data.id"
                                            >
                                                <td>{{ line.first_name }}</td>
                                                <td>{{ line.last_name }}</td>
                                                <td>{{ line.email }}</td>
                                                <td>{{ line.gender }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="dataTable-bottom">
                                    <nav class="dataTable-pagination">
                                        <ul
                                            class="dataTable-pagination-list"
                                        ></ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="px-5"></div>
                        </div>
                        <br />
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li v-if="prev_page_url">
                                    <span
                                        class="mx-1"
                                        aria-hidden="true"
                                        @click="getCustomers(prev_page_url)"
                                    >
                                        &lt;&lt;prev</span
                                    >
                                </li>
                                <li>
                                    <span
                                        >Page {{ current_page }} of
                                        {{ last_page }}</span
                                    >
                                </li>

                                <li v-if="next_page_url">
                                    <span
                                        class="mx-1"
                                        aria-hidden="true"
                                        @click="getCustomers(next_page_url)"
                                        >next>></span
                                    >
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="profile"
                        role="tabpanel"
                        aria-labelledby="profile-tab"
                    >
                        <Bar
                            :chart-options="chartOptions"
                            :chart-data="chartData"
                            chart-id="bar"
                            dataset-id-key="datasetIdKey"
                            :width="500"
                            :height="150"
                        />
                    </div>
                </div>
                <!-- End Default Tabs -->
            </div>
        </div>
    </div>
</template>

<script>
import { Bar } from "vue-chartjs/legacy";
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
} from "chart.js";

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
);

export default {
    data() {
        return {
            api_url: process.env.MIX_API_URL,
            data: {},
            total: null,
            first_page_url: null,
            prev_page_url: null,
            next_page_url: null,
            current_page: null,
            from: null,
            to: null,
            last_page: null,
            charts: {},
            chartData: {
                labels: ["total", "invalid email", "no gender", "no last name"],
                datasets: [
                    {
                        label: "Wrong registers",
                        backgroundColor: "#f87979",
                        data: [0, 0, 0, 0],
                    },
                ],
            },
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false,
            },
        };
    },
    components: {
        Bar,
    },

    beforeMount() {
        this.getCustomers();
    },
    methods: {
        async getCustomers(url = `${this.api_url}/reports`) {
            const res = await fetch(url);
            const data = await res.json();
            console.log(data);
            this.total = data.total;
            this.first_page_url = data.first_page_url;
            this.prev_page_url = data.prev_page_url;
            this.next_page_url = data.next_page_url;
            this.current_page = data.current_page;
            this.from = data.from;
            this.to = data.to;
            this.last_page = data.last_page;
            this.data = data.data;
            this.getCharts();
        },

        async getCharts() {
            const res = await fetch(`${this.api_url}/charts`);
            const data = await res.json();
            console.log(data);
            this.charts = data;
            this.chartData.datasets[0].data[0] = data.total;
            this.chartData.datasets[0].data[1] = data.invalidEmail;
            this.chartData.datasets[0].data[2] = data.noGender;
            this.chartData.datasets[0].data[3] = data.noLastName;
            this.chartData.datasets[0].label = "Strange registers";
        },
    },
};
</script>
