from locust import HttpUser,task

class PruebaClases(HttpUser):

    @task
    def reservas_usuarios(self):
        self.client.get("/api/reservas_usuarios/3")

    @task
    def reservas_clase(self):
        self.client.get("/api/reservas_clase/2")