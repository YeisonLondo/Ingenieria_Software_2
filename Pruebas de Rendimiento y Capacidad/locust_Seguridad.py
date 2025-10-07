from locust import HttpUser, task

class PruebaLogin(HttpUser):

    @task
    def login(self):
        with self.client.post(
            "/api/login",
            json={
                "email": "yeison@gmail.com",
                "password": "55555"
            },
            catch_response=True
        ) as response:
            print(response.status_code, response.text)
