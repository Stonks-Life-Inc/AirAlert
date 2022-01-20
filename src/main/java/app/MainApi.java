package app;

import java.io.IOException;
import java.util.concurrent.TimeoutException;

import javax.ws.rs.ApplicationPath;

import org.glassfish.jersey.server.ResourceConfig;

@ApplicationPath("")
public class MainApi extends ResourceConfig {

	
	
	public MainApi() throws IOException, TimeoutException {
		packages("app");
		
		MqttClient client = new MqttClient();
		
		
	}
}
