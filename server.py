import socket
import time
import argparse
import json
from keras import backend as K
K.set_image_dim_ordering('tf')
from keras.models import load_model

from keras.preprocessing import image as image_utils
import sklearn
import numpy as np
# time.sleep(10)

model = load_model("Best model probably.h5")

classes=['Acer campestre',
 'Acer ginnala',
 'Acer griseum',
 'Acer negundo',
 'Acer palmatum',
 'Acer pensylvanicum',
 'Acer platanoides',
 'Acer pseudoplatanus',
 'Acer rubrum',
 'Acer saccharinum',
 'Acer saccharum',
 'Aesculus flava',
 'Aesculus glabra',
 'Aesculus hippocastamon',
 'Aesculus pavi',
 'Ailanthus altissima',
 'Albizia julibrissin',
 'Amelanchier arborea',
 'Amelanchier canadensis',
 'Amelanchier laevis',
 'Asimina triloba',
 'Betula alleghaniensis',
 'Betula jacqemontii',
 'Betula lenta',
 'Betula nigra',
 'Betula populifolia',
 'Broussonettia papyrifera',
 'Carpinus betulus',
 'Carpinus caroliniana',
 'Carya cordiformis',
 'Carya glabra',
 'Carya ovata',
 'Carya tomentosa',
 'Castanea dentata',
 'Catalpa bignonioides',
 'Catalpa speciosa',
 'Cedrus atlantica',
 'Cedrus deodara',
 'Cedrus libani',
 'Celtis occidentalis',
 'Celtis tenuifolia',
 'Cercidiphyllum japonicum',
 'Cercis canadensis',
 'Chamaecyparis pisifera',
 'Chamaecyparis thyoides',
 'Chionanthus retusus',
 'Chionanthus virginicus',
 'Cladrastis lutea',
 'Cornus florida',
 'Cornus kousa',
 'Cornus mas',
 'Corylus colurna',
 'Crataegus crus-galli',
 'Crataegus laevigata',
 'Crataegus phaenopyrum',
 'Crataegus pruinosa',
 'Crataegus viridis',
 'Cryptomeria japonica',
 'Diospyros virginiana',
 'Eucommia ulmoides',
 'Evodia daniellii',
 'Fagus grandifolia',
 'Ficus carica',
 'Fraxinus americana',
 'Fraxinus nigra',
 'Fraxinus pennsylvanica',
 'Ginkgo biloba',
 'Gleditsia triacanthos',
 'Gymnocladus dioicus',
 'Halesia tetraptera',
 'Ilex opaca',
 'Juglans cinerea',
 'Juglans nigra',
 'Juniperus virginiana',
 'Koelreuteria paniculata',
 'Liquidambar styraciflua',
 'Liriodendron tulipifera',
 'Maclura pomifera',
 'Magnolia acuminata',
 'Magnolia denudata',
 'Magnolia grandiflora',
 'Magnolia macrophylla',
 'Magnolia soulangiana',
 'Magnolia stellata',
 'Magnolia tripetala',
 'Magnolia virginiana',
 'Malus angustifolia',
 'Malus baccata',
 'Malus coronaria',
 'Malus floribunda',
 'Malus hupehensis',
 'Malus pumila',
 'Metasequoia glyptostroboides',
 'Morus alba',
 'Morus rubra',
 'Nyssa sylvatica',
 'Ostrya virginiana',
 'Oxydendrum arboreum',
 'Paulownia tomentosa',
 'Phellodendron amurense',
 'Pinus bungeana',
 'Pinus cembra',
 'Pinus densiflora',
 'Pinus echinata',
 'Pinus flexilis',
 'Pinus koraiensis',
 'Pinus nigra',
 'Pinus parviflora',
 'Pinus peucea',
 'Pinus pungens',
 'Pinus resinosa',
 'Pinus rigida',
 'Pinus strobus',
 'Pinus sylvestris',
 'Pinus taeda',
 'Pinus thunbergii',
 'Pinus virginiana',
 'Pinus wallichiana',
 'Platanus acerifolia',
 'Platanus occidentalis',
 'Populus deltoides',
 'Populus grandidentata',
 'Populus tremuloides',
 'Prunus pensylvanica',
 'Prunus sargentii',
 'Prunus serotina',
 'Prunus serrulata',
 'Prunus subhirtella',
 'Prunus virginiana',
 'Prunus yedoensis',
 'Pseudolarix amabilis',
 'Ptelea trifoliata',
 'Pyrus calleryana',
 'Quercus acutissima',
 'Quercus alba',
 'Quercus bicolor',
 'Quercus cerris',
 'Quercus coccinea',
 'Quercus falcata',
 'Quercus imbricaria',
 'Quercus macrocarpa',
 'Quercus marilandica',
 'Quercus michauxii',
 'Quercus montana',
 'Quercus muehlenbergii',
 'Quercus nigra',
 'Quercus palustris',
 'Quercus phellos',
 'Quercus robur',
 'Quercus rubra',
 'Quercus shumardii',
 'Quercus stellata',
 'Quercus velutina',
 'Quercus virginiana',
 'Robinia pseudo-acacia',
 'Salix babylonica',
 'Salix caroliniana',
 'Salix matsudana',
 'Salix nigra',
 'Sassafras albidum',
 'Staphylea trifolia',
 'Stewartia pseudocamellia',
 'Styrax japonica',
 'Styrax obassia',
 'Syringa reticulata',
 'Taxodium distichum',
 'Tilia americana',
 'Tilia cordata',
 'Tilia europaea',
 'Tilia tomentosa',
 'Toona sinensis',
 'Tsuga canadensis',
 'Ulmus americana',
 'Ulmus glabra',
 'Ulmus parvifolia',
 'Ulmus procera',
 'Ulmus pumila',
 'Ulmus rubra',
 'Zelkova serrata']



def Main():
    host = '127.0.0.1'
    port = 5000
    s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)

    s.bind((host,port))


    print ("Server Started.")
    while True:
        data, addr = s.recvfrom(1024)
        print ("message From: " + str(addr))
        print ("from connected user: " + str(data))
        image = image_utils.load_img(data, target_size=(256, 256))
        image = image_utils.img_to_array(image)
        # image.shape
        image = image/255.0
        image = np.expand_dims(image, axis=0)
        data = classes[model.predict_classes(image)[0]]
        # data = str(data).upper()
        print ("sending: " + str(data))
        s.sendto(data, addr)
    c.close()

if __name__ == '__main__':
    Main()
