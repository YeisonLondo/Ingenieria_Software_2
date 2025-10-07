from locust import HttpUser, task

class PruebaRecomendar(HttpUser):
    @task
    def recomendar(self):

        self.client.post(
            "/recomendar",
            json={"peso": 90, "altura": 1.6}
        )

    @task
    def recomendar2(self):

        self.client.post(
            "/recomendar",
            json={"peso": 55, "altura": 1.75}
        )

