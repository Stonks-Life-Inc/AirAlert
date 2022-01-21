package app;

import java.io.IOException;
import java.util.concurrent.TimeoutException;

import javax.servlet.ServletContextListener;
import javax.servlet.annotation.WebListener;
import javax.ws.rs.ApplicationPath;

import org.glassfish.jersey.server.ResourceConfig;

@ApplicationPath("")
@WebListener
public class MainApi extends ResourceConfig implements ServletContextListener {

	
	
	public MainApi() throws IOException, TimeoutException {
		packages("app");
		System.out.println("yolo");
		
		
		//MqttClient client = new MqttClient();
		//Consumer consumer = new Consumer();
		
	}
}
