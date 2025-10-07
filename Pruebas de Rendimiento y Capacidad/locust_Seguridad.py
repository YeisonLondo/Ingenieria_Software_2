from locust import HttpUser, task, between

class PruebaLogin(HttpUser):

    @task
    def login(self):
        self.client.post(
            "/api/login",
            json={
                "email": "yeison@gmail.com", 
                "password": "55555"           
            }
        )
