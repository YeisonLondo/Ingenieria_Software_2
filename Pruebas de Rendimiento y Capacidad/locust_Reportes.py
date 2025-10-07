from locust import HttpUser, task

class PruebaExcel(HttpUser):

    @task
    def generar_pdf(self):
        self.client.get("/api/reporte_clase/2")

    @task
    def generar_excel(self):
        self.client.get("/api/reporte_excel")