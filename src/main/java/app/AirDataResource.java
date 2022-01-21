package app;

import java.util.ArrayList;
import java.util.List;

import javax.ws.rs.Consumes;
import javax.ws.rs.DELETE;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.PUT;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.QueryParam;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;
import javax.ws.rs.core.Response.Status;


@Path("airData")
public class AirDataResource {
	private List<AirData> airData = new ArrayList<>();
	
	public AirDataResource() {
		//Nouveau relevé test
		AirData ad = new AirData();
		ad.setId(0);
		ad.setDateMesure("2022-01-20");
		ad.setNo2(10);
		ad.setO3(50);
		ad.setPm10(1000);
		ad.setSo2(2);
		//On ajoute ce nouveau relevé.
		airData.add(ad);
		
		ad.setId(1);
		ad.setDateMesure("2022-01-21");
		ad.setNo2(50);
		ad.setO3(14);
		ad.setPm10(32);
		ad.setSo2(10);
		airData.add(ad);
	}
	
	//Retourne toutes les relevés contenus dans le serveur
	@GET
	@Produces(MediaType.APPLICATION_JSON)
	public Response getAllAirData() {
		return Response.ok(Consumer.airDataConsumer).build();
	}
	
	//On cherche un relevé de l'état de l'air grâce à l'ID du relevé
	@Path("{id}")
	@GET
	@Produces(MediaType.APPLICATION_JSON)
	public Response getAirData(@PathParam("id") int id) {
		return Response.ok(airData.stream().filter(
				airData -> id == airData.getId())
				.findAny().orElse(null)
			).build();
	}
	
	//Ajouter une nouvelle série de données sur l'état de l'air.
	//Cette action de l'API sera utilisé par la station météo pour publier son 
	//compte rendu
	@POST
	@Consumes(MediaType.APPLICATION_JSON)
	@Produces(MediaType.APPLICATION_JSON)
	public Response addAirData(AirData ad) {
		airData.add(ad);
		return Response.ok().build();
	}
	
	//Action de mise à jour d'un relevé selon son id.
	@PUT
	@Path("{id}")
	@Consumes(MediaType.APPLICATION_JSON)
	@Produces(MediaType.APPLICATION_JSON)
	public Response updateAirData(@PathParam("id") int id, AirData newAd) {
		AirData oldAd = airData.stream().filter(airData -> id == airData.getId()).findAny().orElse(null);
		if (oldAd == null) {
			return Response.status(Status.NOT_FOUND).build();
		}
		airData.remove(id);
		airData.add(newAd);
		return Response.ok(airData).build();
	}
	
	@DELETE
	@Path("{id}")
	@Produces(MediaType.APPLICATION_JSON)
	public Response deleteAirData(@PathParam("id") int id) {
		airData.remove(id);
		return Response.ok(airData	).build();
	}
	
	//Action de recherche de notre API
	@GET
	@Path("_search")
	@Produces(MediaType.APPLICATION_JSON)
	public Response search(@QueryParam("id") Integer id, @QueryParam("dateMesure") String dateMesure) {
		if(id != null && dateMesure != null) {
			return Response.ok(airData.stream().filter(airData -> id == airData.getId() && dateMesure.contains(airData.getDateMesure()))
					.findAny().orElse(null)).build();
		}else if(id != null && dateMesure == null) {
			return Response.ok(airData.stream().filter(airData -> id == airData.getId()).findAny().orElse(null)).build();
		}else if(id == null && dateMesure != null) {
			return Response.ok(airData.stream().filter(airData -> dateMesure.contains(airData.getDateMesure())).findAny().orElse(null)).build();
		}else {
			return Response.ok(airData).build();
		}
	}
}
