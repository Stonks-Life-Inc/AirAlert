package resources;

import javax.ws.rs.ApplicationPath;

import org.glassfish.jersey.server.ResourceConfig;

@ApplicationPath("AirAlert")
public class RestAPI extends ResourceConfig{

	public RestAPI() {
		packages("resource");
	}
}
