from locust import HttpUser, task
import random

class PruebaFecha(HttpUser):

    fechas = [
        "2025-10-10",
        "2025-10-11",
        "2025-10-12",
        "2025-10-13",
    ]

    @task
    def buscar_fecha(self):
        fecha = random.choice(self.fechas)
        self.client.get(f"/buscar_fecha/{fecha}")
